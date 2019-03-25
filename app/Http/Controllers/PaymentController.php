<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_log;
use App\Models\Order_number;
use App\Models\Order_address;
use App\Models\User;
use App\Payments\Processor;
use App\Events\OrderReceived;
use App\Mail\OrderUser;
use App\Mail\OrderAp21Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAdmin;
use App\Payments\AfterpayProcessor;
use App\Payments\AfterpayApiClient;
use App\SYG\Bridges\BridgeInterface;
use Illuminate\Database\Eloquent\Model;
use App\Models\Promo_mast;

class PaymentController extends Controller {

    protected $cart;
    protected $order;
    protected $processor;
    protected $afterpay_processor;
    protected $bridge;

    public function __construct(Processor $processor, BridgeInterface $bridge) {
        $this->middleware(function ($request, $next) {

            $this->cart = Cart::where('id', session('cart_id'))->first();

            if (isset($this->cart) && !empty($this->cart)) {
                foreach ($this->cart->cartItems as $cart_item) {
                    $this->cart['items_count'] += $cart_item->qty;
                }
            }

            if (!$this->cart || $this->cart->items_count < 1) {
                return redirect('cart');
            }

            $this->order = $this->cart->order;

            if (!check_promo_validity($this->order->coupon_code)) {
                Cart::where('id', session('cart_id'))->update(['promo_code' => '', 'promo_string' => '', 'sku' => 0]);
                Order::where('id', $this->order->id)->update(['coupon_code' => '', 'discount' => 0.00, 'total' => $this->order->total + $this->order->discount, 'grand_total' => $this->order->freight_cost + $this->order->total + $this->order->discount]);
                return redirect('cart')->with('promo_expire', 'Promo Expired');
            }

            if (!$this->order) {
                return redirect('shipping');
            }

            if (!$this->order->address->isValid()) {
                return redirect('shipping');
            }

            if ($this->order->getItemsCount() != $this->cart->items_count) {
                return redirect('cart');
            }

            return $next($request);
        });
        $this->processor = $processor;
        $this->bridge = $bridge;
    }

    public function create() {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
        if (isset($this->order->gift_amount) && $this->order->gift_amount > 0 && $this->order->grand_total == 0.00) {
            $logger = array(
                'order_id' => $this->order->id,
                'log_title' => 'Gift Certificate Payment'
            );
            Order_log::insert($logger);
            $orderReport = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
            $time = Carbon::now();
            $timestamp = $time->format('Y-m-d H:i:s');
            Order::where('id', $this->order->id)->update(['status' => 'Order Completed', 'payment_status' => Carbon::now()]);

            $result = $this->process_order($this->order->id, 'gift_cert', $orderReport, 0, $timestamp);


            $order = $this->order->load('orderItems.variant.product', 'address');
            event(new OrderReceived($order));
            return redirect('/order/success');
        } else {
            return view('customer.payment', [
                'clientToken' => $this->processor->getToken(),
                'cartGrandTotal' => $this->order->grand_total,
                    ], compact('cart'));
        }
    }

    public function create_token(AfterpayProcessor $afterpay_processor) {
        $get_afterpay_token = json_decode($afterpay_processor->getAfterpayToken($this->order));
        $token = $get_afterpay_token->token;
        $this->order->update(array('afterpay_token' => $token));
        return $token;
    }

    public function afterpay_success(Request $request, AfterpayProcessor $afterpay_processor) {
        if ($request->status == "SUCCESS" && $request->orderToken != "" && $this->order->id != 0) {
            $get_order_details = $afterpay_processor->getOrder($this->order->afterpay_token);
            $charge_payment = json_decode($afterpay_processor->charge($this->order), true);

            if (isset($charge_payment['status']) && $charge_payment['status'] == "APPROVED" && $charge_payment['token'] != "") {
                Order::where('id', $this->order->id)->update(['payment_type' => 'AfterPay']);
                $transaction_id = $charge_payment['id'];
                $this->order->update(array('status' => 'Order Completed', 'transaction_id' => $transaction_id, 'transaction_status' => 'Succeeded', 'payment_status' => Carbon::now()));
                $xml = '';
                $afterpay_result = 'Success';
                $log_title = "AfterPay Payment";
                $log_type = "Response";
                $log_status = "AfterPay Payment Process Completed";
                $orderReport = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
                $time = Carbon::now();
                $timestamp = $time->format('Y-m-d H:i:s');

                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => $log_title,
                    'log_type' => $log_type,
                    'log_status' => $log_status,
                    'result' => $orderReport,
                    'xml' => (!empty($xml)) ? $xml : '',
                    'transaction_id' => $transaction_id,
                    'transaction_result' => $afterpay_result,
                    'transaction_data' => json_encode($charge_payment)
                );
                Order_log::insert($logger);

                $orderDataUpdate = array(
                    'transaction_status' => 'Succeeded',
                    'transaction_id' => $transaction_id,
                    'transaction_dt' => date('Y-m-d H:i:s'),
                    'payment_status' => date('Y-m-d H:i:s')
                );
                $order_no = $this->addOrderNo($this->order->id);
                if ($order_no != "") {
                    Order::where('id', $this->order->id)->update(['order_no' => $order_no]);
                }

                $Person = User::firstOrCreate(['email' => $this->order->address->email], ['first_name' => $this->order->address->s_fname, 'last_name' => $this->order->address->s_lname, 'source' => 'Order']);
                if (isset($Person)) {
                    $PersonID = ($Person->person_idx != '') ? $Person->person_idx : '';
                }
                if (env('AP21_STATUS') == 'ON') {
                    if (empty($PersonID)) {
                        $PersonID = $this->get_personid($this->order->address->email);
                        $orderDataUpdate['person_idx'] = $PersonID;
                        $orderDataUpdate['personid_status'] = date('Y-m-d H:i:s');
                    }
                    if (!empty($PersonID)) {
                        $this->ap21order($PersonID);
                    }
                } else {
                    $logger = array(
                        'order_id' => $this->order->id,
                        'log_title' => 'Person',
                        'log_type' => 'Response',
                        'log_status' => 'System not connected to ap21',
                        'result' => 'Ap21-OFF',
                    );
                    Order_log::createNew($logger);
                }

                if (!empty($PersonID)) {
                    Order::where('id', $this->order->id)->update($orderDataUpdate);
                    User::where('email', $this->order->address->email)->update(['person_idx' => $PersonID]);
                }

                $order = $this->order->load('orderItems.variant.product', 'address');
                event(new OrderReceived($order));
                return redirect('/order/success');
            } else {
                $this->order->update(array('status' => 'AfterPay Processor Declined', 'transaction_status' => 'Incomplete', 'payment_status' => Carbon::now()
                ));
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'AfterPay Payment',
                    'log_type' => 'Response',
                    'log_status' => 'AfterPay Processor Declined',
                    'result' => $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'],
                    'transaction_id' => isset($charge_payment['errorId']) ? $charge_payment['errorId'] : "",
                    'transaction_result' => 'Failed'
                );
                Order_log::insert($logger);
                return redirect('/payment')->with('afterpay_cancel', 'AfterPay Cancel');
            }
        } else {
            //return redirect('/cart');
            $this->order->update(array('status' => 'AfterPay Processor Declined', 'transaction_status' => 'Incomplete', 'payment_status' => Carbon::now()
            ));
            $logger = array(
                'order_id' => ($this->order->id) ? $this->order->id : 0,
                'log_title' => 'AfterPay Payment',
                'log_type' => 'Response',
                'log_status' => 'AfterPay Processor Declined',
                'result' => $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'],
                'transaction_id' => isset($charge_payment['errorId']) ? $charge_payment['errorId'] : "0",
                'xml' => $this->order,
                'transaction_result' => 'Failed',
                'transaction_data' => $request->all()
            );
            Order_log::insert($logger);
            return redirect('/payment')->with('afterpay_cancel', 'AfterPay Cancel');
        }
    }

    public function afterpay_cancel(Request $request) {
        $this->order->update(array('status' => 'Order Incomplete', 'transaction_status' => 'Incomplete', 'payment_status' => Carbon::now()));
        $logger = array(
            'order_id' => $this->order->id,
            'log_title' => 'AfterPay Payment',
            'log_type' => 'Response',
            'log_status' => 'AfterPay Processor Declined',
            'result' => $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'],
            'transaction_result' => 'Failed'
        );
        Order_log::insert($logger);
        return redirect('/payment')->with('afterpay_cancel', 'AfterPay Cancel');
    }

    public function store() {
        $transation_result = $this->processor->charge($this->order);
        $this->order->updateOrder($transation_result);

        if (!$transation_result) {
            $logger = array(
                'order_id' => $this->order->id,
                'log_title' => 'Braintree Payment',
                'log_type' => 'Response',
                'log_status' => 'Braintree Processor Declined',
                'result' => $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'],
                'xml' => (!empty($xml)) ? $xml : '',
                'transaction_result' => 'Failed'
            );
            Order_log::insert($logger);
            return back()->withErrors(['payment' => 'Your payment was declined']);
        }

        if ($transation_result->processorResponseCode == "1000" && $transation_result->processorResponseText == "Approved") {
            $order_id = $transation_result->orderId;
            $card_type = (isset($transation_result->creditCard['cardType']) && $transation_result->creditCard['cardType'] != "") ? $transation_result->creditCard['cardType'] : "";
            $braintree_result = 'Success';
            $transaction_id = $transation_result->id;
            $log_title = "Braintree Payment";
            $log_type = "Response";
            $log_status = "Braintree Payment Process Completed";
            $orderReport = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
            $xml = '';
            $payment = 'Braintree';
            $time = Carbon::now();
            $timestamp = $time->format('Y-m-d H:i:s');
            $orderDataUpdate = array(
                'card_type' => $card_type,
                'status' => 'Order Completed'
            );
            Order::where('id', $order_id)->update($orderDataUpdate);

            $logger = array(
                'order_id' => $order_id,
                'log_title' => $log_title,
                'log_type' => $log_type,
                'log_status' => $log_status,
                'result' => $orderReport,
                'xml' => (!empty($xml)) ? $xml : '',
                'transaction_id' => $transaction_id,
                'transaction_result' => $braintree_result,
                'transaction_data' => $transation_result
            );
            Order_log::insert($logger);

            $result = $this->process_order($order_id, $payment, $orderReport, $transaction_id, $timestamp);


            $order = $this->order->load('orderItems.variant.product', 'address');
            event(new OrderReceived($order));
            return redirect('/order/success');
            //
            //return view( 'customer.orderconfirmed', compact('order') );
        } else {
            $order_id = $transation_result->orderId;
            $orderCheck = $this->checkOrderMast_prev($order_id);
            if ($orderCheck) {

                $order_no = $this->addOrderNo($order_id);
                if (empty($order_no)) {
                    $order_no = $order_id;
                }

                $order = $this->order->load('orderItems.variant.product', 'address');
                event(new OrderReceived($order));
                return redirect('/order/success');
            } else {

                $transaction_result = "Failed";
                // $transaction = $transation_result->transaction;
                $transaction_id = $transation_result->id;
                // $vault_result_message = $transation_result->message;
                $order_id = $transation_result->orderId;

                $check_transaction_status = $this->checkOrderMastTransStatus($order_id);

                if ($check_transaction_status == "Succeeded") {

                    $order_no = $this->addOrderNo($order_id);
                    if (empty($order_no)) {
                        $order_no = $order_id;
                    }

                    $order = $this->order->load('orderItems.variant.product', 'address');
                    event(new OrderReceived($order));
                    return redirect('/order/success');
                } else {

                    $orderDataUpdate = array(
                        'transaction_status' => 'Braintree Processor Declined',
                        'status' => 'Order Failed'
                    );
                    Order::where('id', $order_id)->update($orderDataUpdate);

                    $orderReport = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
                    $transaction_id = $transation_result->id;
                    $log_title = "Braintree Payment";
                    $log_type = "Response";
                    $log_status = "Braintree Processor Declined";
                    $transaction_result = "Failed";

                    $logger = array(
                        'order_id' => $order_id,
                        'log_title' => $log_title,
                        'log_type' => $log_type,
                        'log_status' => $log_status,
                        'result' => $orderReport,
                        'xml' => (!empty($xml)) ? $xml : '',
                        'transaction_id' => $transaction_id,
                        'transaction_result' => $transaction_result
                    );
                    Order_log::insert($logger);

                    $order_no = $this->addOrderNo($order_id);
                    if (empty($order_no)) {
                        $order_no = $order_id;
                    }

                    //return view( 'customer.orderconfirmed', compact('order') );
                    // echo "Braintree Processor Declined";
                    // exit;
                    // $order = $this->order->load('orderItems.variant.product', 'address');
                    // event(new OrderReceived($order));
                    return redirect('/order/failed');
                }
            }
        }



        // Cache::forget( 'cart'  . $this->order->cart_id );
        // $this->cart->delete();
        // session()->forget('cart_id');
        // $order = $this->order->load('orderItems.variant.product', 'address');
        // event(new OrderReceived($order));
        // return view( 'customer.orderconfirmed', compact('order') );
    }

    public function order_success() {

        Cache::forget('cart' . $this->order->cart_id);
        $this->cart->delete();
        session()->forget('cart_id');
        $order = $this->order->load('orderItems.variant.product', 'address');
        $order_email_find = Order_address::where("order_id", "=", $order->id)->first();
        $order_email = $order_email_find->email;
        $user_id = User::where('email', '=', $order_email)->whereNull('password')->first();
        if ($user_id != '') {
            $user_id = $user_id->id;
        } else {
            $user_id = "no";
        }
        //print_r($user_id);
        return view('customer.orderconfirmed', compact('order', 'user_id', 'order_email'));
    }

    public function order_failed() {

        $order = $this->order->load('orderItems.variant.product', 'address');
        $order_email_find = Order_address::where("order_id", "=", $order->id)->first();
        $order_email = $order_email_find->email;
        $user_id = User::where('email', '=', $order_email)->whereNull('password')->first();
        if ($user_id != '') {
            $user_id = $user_id->id;
        } else {
            $user_id = "no";
        }
        //print_r($user_id);
        return view('customer.orderfailed', compact('order', 'user_id', 'order_email'));
    }

    public function process_order($order_id, $payment, $orderReport, $transaction_id, $timestamp) {

        $orderIdData = Order::where("id", "=", $order_id)->first();
        // echo "<pre>";
        // print_r($orderIdData);
        // exit;
        if ($orderIdData->status == "Order Completed") {

            $order_no = $this->addOrderNo($order_id);
            $date = Carbon::now();
            $timestamp = $date->format('Y-m-d H:i:s');
            switch ($payment) {
                case 'gift_cert':
                    $orderDataUpdate = array(
                        'payment_type' => $payment,
                        'transaction_status' => 'Succeeded',
                        'payment_status' => date('Y-m-d H:i:s')
                    );
                    break;

                case 'Paypal':
                    $orderDataUpdate = array(
                        'payment_type' => $payment,
                        'paypal_trans_id' => '',
                        'transaction_status' => 'Succeeded',
                        'paypal_order_dt' => date('Y-m-d H:i:s'),
                        'payment_status' => date('Y-m-d H:i:s')
                    );
                    break;

                default:
                    $orderDataUpdate = array(
                        'payment_type' => $payment,
                        'transaction_status' => 'Succeeded',
                        'transaction_id' => $transaction_id,
                        'transaction_dt' => date('Y-m-d H:i:s'),
                        'payment_status' => date('Y-m-d H:i:s')
                    );
                    break;
            }

            //ap21 order process 
            $Person = User::firstOrCreate(['email' => $this->order->address->email], ['first_name' => $this->order->address->s_fname, 'last_name' => $this->order->address->s_lname, 'source' => 'Order', 'user_type' => 'Order']);
            if (isset($Person)) {
                $PersonID = ($Person->person_idx != '') ? $Person->person_idx : '';
            }
            if (env('AP21_STATUS') == 'ON') {
                if (empty($PersonID)) {
                    $PersonID = $this->get_personid($this->order->address->email);
                }
                if (!empty($PersonID)) {
                    $this->ap21order($PersonID);
                    $orderDataUpdate['person_idx'] = $PersonID;
                    $orderDataUpdate['personid_status'] = date('Y-m-d H:i:s');
                }
            } else {
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'System not connected to ap21',
                    'result' => 'Ap21-OFF',
                );
                Order_log::createNew($logger);
            }

            if (!empty($PersonID)) {
                User::where('email', $this->order->address->email)->update(['person_idx' => $PersonID]);
            }
            Order::where('id', $this->order->id)->update($orderDataUpdate);
            return true;
        }
    }

    public function addOrderNo($order_id) {
        $order_no = 0;
        $status = 'Order Completed';
        if (env('AP21_STATUS') == 'ON') {
            $order_data = array(
                'order_id' => $order_id
            );

            $order_number_insert = Order_number::create($order_data);
            if ($order_number_insert) {
                $order_no = env('ORDER_PREFIX') . $order_number_insert->id;
                $status = 'Order Number';
            }
        } else {

            $order_no = env('ORDER_PREFIX') . $order_id;
        }
        Order::where('id', $order_id)
                ->update(['status' => $status, 'order_no' => $order_no]);

        return $order_no;
    }

    public function checkOrderMast_prev($order_id) {
        $returnVal = false;
        $result = Order::where([
                    ['id', '=', $order_id],
                    ['status', '=', 'Order Completed']
                ])->get();

        if ($result->count()) {
            $returnVal = true;
        } else {
            $returnVal = false;
        }

        return $returnVal;
    }

    public function checkOrderMastTransStatus($order_id) {
        $transaction_status = "";
        $result = Order::where('id', '=', $order_id)->first();

        if ($result->count()) {
            $transaction_status = $result->transaction_status;
        } else {
            $returnVal = '';
        }

        return $transaction_status;
    }

    public function get_personid($email) {

        $response = $this->bridge->getPersonid($email);
        //print_r($response);
        //exit;      
        $returnCode = $response->getStatusCode();
        $userid = false;
        switch ($returnCode) {
            case '200':
                $response_xml = @simplexml_load_string($response->getBody()->getContents());
                $userid = $response_xml->Person->Id;
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Person Id Found',
                    'result' => $userid,
                );
                Order_log::createNew($logger);
                $returnVal = $userid;
                break;

            case '404':
                $userid = $this->create_user();
                break;

            default:
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Getting Person ID',
                    'result' => $result,
                );

                Order_log::createNew($logger);

                $URL = env('AP21_URL') . "/Persons/?countryCode=" . env('AP21_COUNTRYCODE') . "&email=" . $email;
                $data = array(
                    'api_name' => 'Get PersonID Error',
                    'URL' => $URL,
                    'Result' => $result,
                    'Parameters' => '',
                );
                Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));
                $userid = false;
                break;
        }
        return $userid;
    }

    public function create_user() {

        $fullname = $this->order->address->b_fname . ' ' . $this->order->address->b_lname;
        $fname = $this->order->address->s_fname;
        $lname = $this->order->address->s_lname;
        $returnVal = false;
        $returnData = '';

        if (!empty($fname) && !empty($lname)) {

            $firstname = $fname;
            $lastname = $lname;
        } else {
            list($firstname, $lastname) = explode(' ', $fullname);
        }

        $person_xml = "<Person>
                        <Firstname>$firstname</Firstname>
                        <Surname>$lastname</Surname>
                        <Contacts>
                          <Email>" . $this->order->address->email . "</Email>
                          <Phones>
                            <Home>" . $this->order->address->s_phone . "</Home>
                          </Phones>
                        </Contacts>
                        <Addresses>
                            <Billing>
                              <AddressLine1>" . htmlspecialchars($this->order->address->b_add1) . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars($this->order->address->b_add2) . "</AddressLine2>
                              <City>" . htmlspecialchars($this->order->address->b_city) . "</City>
                              <State>" . htmlspecialchars($this->order->address->b_state) . "</State>
                              <Postcode>" . $this->order->address->b_postcode . "</Postcode>
                              <Country></Country>
                            </Billing>
                            <Delivery>
                              <AddressLine1>" . htmlspecialchars($this->order->address->s_add1) . "</AddressLine1>
                              <AddressLine2>" . htmlspecialchars($this->order->address->s_add2) . "</AddressLine2>
                              <City>" . htmlspecialchars($this->order->address->s_city) . "</City>
                              <State>" . htmlspecialchars($this->order->address->s_state) . "</State>
                              <Postcode>" . $this->order->address->s_postcode . "</Postcode>
                              <Country></Country>
                            </Delivery>
                        </Addresses>
                      </Person>";

        $response = $this->bridge->processPerson($person_xml);
        $URL = env('AP21_URL') . "Persons/?countryCode=" . env('AP21_COUNTRYCODE');
        $logger = array(
            'order_id' => $this->order->id,
            'log_title' => 'Person',
            'log_type' => 'Response',
            'log_status' => 'Generate Person XML',
            'result' => 'Created Person xml and submitted to app21 url:- ' . $URL,
            'xml' => $person_xml
        );
        Order_log::createNew($logger);
        $returnCode = $response->getStatusCode();
        switch ($returnCode) {
            case 201:
                $location = $response->getHeader('Location')[0];
                $str_arr = explode("/", $location);
                $last_seg = $str_arr[count($str_arr) - 1];
                $last_seg_arr = explode("?", $last_seg);
                $person_idx = $last_seg_arr[0];

                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => '201 Person ID Created',
                    'result' => $person_idx,
                    'xml' => $person_xml ? $person_xml : "",
                );
                Order_log::createNew($logger);
                $returnVal = $person_idx;


                break;

            default:
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Person',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Creating Person ID',
                    'result' => $result,
                );
                Order_log::createNew($logger);

                // Send ap21 alert  
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody()->getContents();
                $data = array(
                    'api_name' => 'Create Person Error',
                    'URL' => $URL,
                    'Result' => $result,
                    'Parameters' => $person_xml,
                );
                Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));

                $returnVal = false;

                break;
        }

        return $returnVal;
    }

    public function ap21order($person_id) {
        //echo "<pre>";
        //print_r($this->order);
        //exit;
        $order = Order::where('id', $this->order->id)->first();
        $returnVal = false;
        $returnData = array();
        $returnOrderNum = $this->order->id;
        $add_description = '';
        $order_instruction = '';
        $ordernum = "BRN-" . $order->order_no; //change Order No with new series when site goes live

        if (!empty($this->order->coupon_code)) {
            $order_instruction .= ' Coupon Code :- ' . $this->order->coupon_code;
        }

        if (!empty($this->order->giftcert_ap21code)) {
            $order_instruction .= ' Gift Code :- ' . $this->order->giftcert_ap21code;
        }

        if (!empty($this->order->address->order_info)) {
            $add_description .= $this->order->address->order_info;
        }

        $fullname = $this->order->address->b_fname . ' ' . $this->order->address->b_lname;
        $fname = $this->order->address->s_fname;
        $lname = $this->order->address->s_lname;
        $returnVal = false;
        $returnData = '';

        if (!empty($fname) && !empty($lname)) {

            $firstname = $fname;
            $lastname = $lname;
        } else {
            list($firstname, $lastname) = explode(' ', $fullname);
        }

        $xml_data = "
                <Order>
                <PersonId>$person_id</PersonId>
                <OrderNumber>" . $ordernum . "</OrderNumber>";
        $xml_data .= "<DeliveryInstructions>" . $add_description . "</DeliveryInstructions>";
        $xml_data .= "<OrderInstructions>" . $order_instruction . "</OrderInstructions>";
        $xml_data .= "<Addresses>
                    <Billing>
                      <ContactName>" . htmlspecialchars(((isset($fullname) && $fullname != "") ? $fullname : "")) . "</ContactName>
                      <AddressLine1>" . htmlspecialchars(((isset($this->order->address->b_add1) && $this->order->address->b_add1 != "") ? $this->order->address->b_add1 : $this->order->address->s_add1)) . "</AddressLine1>
                      <AddressLine2>" . htmlspecialchars(((isset($this->order->address->b_add2) && $this->order->address->b_add2 != "") ? $this->order->address->b_add2 : $this->order->address->s_add2)) . "</AddressLine2>
                      <City>" . htmlspecialchars(((isset($this->order->address->b_city) && $this->order->address->b_city != "") ? $this->order->address->b_city : $this->order->address->s_city)) . "</City>
                      <State>" . htmlspecialchars(((isset($this->order->address->b_state) && $this->order->address->b_state != "") ? $this->order->address->b_state : $this->order->address->s_state)) . "</State>
                      <Postcode>" . htmlspecialchars(((isset($this->order->address->b_postcode) && $this->order->address->b_postcode != "") ? $this->order->address->b_postcode : $this->order->address->s_postcode)) . "</Postcode>
                      <Country></Country>
                    </Billing>
                    <Delivery>
                      <ContactName>" . htmlspecialchars($this->order->address->s_fname) . " " . $this->order->address->s_lname . "</ContactName>
                      <AddressLine1>" . htmlspecialchars($this->order->address->s_add1) . "</AddressLine1>
                      <AddressLine2>" . htmlspecialchars($this->order->address->s_add2) . "</AddressLine2>
                      <City>" . htmlspecialchars($this->order->address->s_city) . "</City>
                      <State>" . htmlspecialchars($this->order->address->s_state) . "</State>
                      <Postcode>" . htmlspecialchars($this->order->address->s_postcode) . "</Postcode>
                      <Country></Country>
                    </Delivery>
                </Addresses>
                <Contacts>
                    <Email>" . $this->order->address->email . "</Email>
                    <Phones>
                        <Home>" . $this->order->address->s_phone . "</Home>
                    </Phones>
                </Contacts>
                <OrderDetails>";


        $i = 0;

        $subtotal = 0;
        foreach ($this->order->orderItems as $item) {

            $sku = $item->variant->id;
            $qty = $item->qty;
            $price = $item->price_sale;
            //$value = $qty * $price;
            $value = $item->total;
            $discount = ($item->discount != 0) ? $item->discount : 0;
            $promo_code = $item->promo_code;
            $promo_string = $item->promo_string;


            $xml_data .= "
                        <OrderDetail>
                          <SkuId>$sku</SkuId>
                          <Quantity>$qty</Quantity>
                          <Price>$price</Price>";


            if (!empty($discount)) {
                $xml_data .= "<Discounts>
              <Discount>
              <DiscountType>ManualDiscount</DiscountType>
              <DiscountTypeId>1</DiscountTypeId>
              <ReasonId>720</ReasonId>>";

                if ($promo_code == 'BROOKS30' && $promo_string != ''):
                    $xml_data .= "<Description>$promo_string</Description>";
                else:
                    $xml_data .= "<Description>$promo_code</Description>";
                endif;
                $xml_data .= "<Value>$discount</Value>
              </Discount>
              </Discounts>";
            }

            $xml_data .= " <Value>$value</Value>
                        </OrderDetail>";
            $i++;

            $subtotal += $value;
        }

        if (!empty($this->order->freight_cost) && $this->order->freight_cost != 0) {
            $xml_data .= "<OrderDetail>
                                  <SkuId>2542</SkuId>
                                  <Quantity>1</Quantity>
                                  <Price>" . $this->order->freight_cost . "</Price> 
                                  <Value>" . $this->order->freight_cost . "</Value>
                                </OrderDetail>";
            $subtotal += $this->order->freight_cost;
        }

        $xml_data .= "
                </OrderDetails>";
        $xml_data .= "<Payments>";

        $gift_data = $this->giftVoucherGvvalid();
        //print_r($gift_data);
        if ($gift_data) {

            $gift_amount = $this->order->gift_amount;
            $subtotal = $subtotal - $gift_amount;

            $xml_data .= " <PaymentDetail>
          <Origin>GiftVoucher</Origin>
          <VoucherNumber>" . $gift_data['VoucherNumber'] . "</VoucherNumber>
          <ValidationId>" . $gift_data['ValidationId'] . "</ValidationId>
          <Amount>" . $gift_amount . "</Amount>
          </PaymentDetail>";

            $subtotal = number_format($subtotal, 2);
        }
        if ($order->payment_type == "AfterPay") {
            $merchant_id = env('AFTERPAY_MERCHANT_ID');
            $xml_data .= "<PaymentDetail>
						<Origin>CreditCard</Origin>
						<MerchantId>" . $merchant_id . "</MerchantId>
						<CardType>AFTERPAY</CardType>
                        <Stan>" . $this->order->id . "</Stan>
                        <Settlement>" . $this->order->id . "</Settlement>
						<Reference>" . $this->order->transaction_id . "</Reference>
						<Amount>" . $subtotal . "</Amount>
						</PaymentDetail>\n\t\t";
        } else {
            $xml_data .= "<PaymentDetail>
                            <Id>7781</Id>
                            <Origin>CreditCard</Origin>
                            <CardType>MASTERCARD / VISA</CardType>
                            <Stan>" . $this->order->id . "</Stan>                            
                            <Settlement>" . $this->order->id . "</Settlement>
                            <AuthCode/>
                            <AccountType/>";

            if (!empty($this->order->transaction_id)) {
                $xml_data .= "<Reference>" . $this->order->transaction_id . "</Reference>";
            } else {
                $xml_data .= "<Reference>Ref1</Reference>";
            }

            $xml_data .= "<Amount>" . $subtotal . "</Amount>";
            $xml_data .= "<Message>payment_statusCURRENTbank_</Message>";
            $xml_data .= "</PaymentDetail>";
        }
        $xml_data .= "</Payments>";

        $xml_data .= "</Order>";

        //echo $xml_data;

        $this->order->updateOrder_xml($xml_data);
        $response = $this->bridge->processOrder($person_id, $xml_data);
        $URL = env('AP21_URL') . "/Persons/$person_id/Orders/?countryCode=" . env('AP21_COUNTRYCODE');
        $returnCode = $response->getStatusCode();
        switch ($returnCode) {
            case 201:
                $location = $response->getHeader('Location')[0];
                $str_arr = explode("/", $location);
                $last_seg = $str_arr[count($str_arr) - 1];
                $last_seg_arr = explode("?", $last_seg);
                $order_id = $last_seg_arr[0];
                $order_url = env('AP21_URL') . "/Persons/$person_id/Orders/$order_id?countryCode=" . env('AP21_COUNTRYCODE');

                $returnVal = $order_id;
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Order',
                    'log_type' => 'Response',
                    'log_status' => '201 Order Created',
                    'result' => $response->getBody(),
                    'xml' => $xml_data
                );

                Order_log::createNew($logger);

                $orderDataUpdate = array(
                    'status' => 'Completed',
                    'app21_order' => $returnVal,
                    'app21_order_status' => date('Y-m-d H:i:s')
                );
                Order::where('id', $this->order->id)->update($orderDataUpdate);
                break;
            case 400 :

                $returnVal = false;
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Order',
                    'log_type' => 'Response',
                    'log_status' => '400 Order exists',
                    'result' => $response->getBody(),
                );
                Order_log::createNew($logger);

                // Send ap21 alert  
                $data = array(
                    'api_name' => 'Order Exists',
                    'URL' => $URL,
                    'Result' => $response->getBody(),
                    'Parameters' => $xml_data,
                );
                Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));
                break;

            default:

                $returnVal = false;
                $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();
                $logger = array(
                    'order_id' => $this->order->id,
                    'log_title' => 'Order',
                    'log_type' => 'Response',
                    'log_status' => 'Error While Creating Order',
                    'result' => $result,
                );
                Order_log::createNew($logger);
                // Send ap21 alert 
                $data = array(
                    'api_name' => 'Create Order Error',
                    'URL' => $URL,
                    'Result' => $result,
                    'Parameters' => $xml_data,
                );
                Mail::to(config('site.notify_email'))
                        ->cc(config('site.syg_notify_email'))
                        ->send(new OrderAp21Alert($this->order, $data));

                $returnVal = false;

                break;
        }
        //exit;
        return $returnVal;
    }

    public function giftVoucherGvvalid() {
        $dataValue = false;
        if ($this->order->gift_amount > 0) {

            $gift = $this->order->giftcert_ap21code;
            $pin = $this->order->giftcert_ap21pin;
            $amount = $this->order->gift_amount;
            $url = env('AP21_URL') . "/Voucher/GVValid/{$gift}?pin={$pin}&amount={$amount}&countryCode=" . env('AP21_COUNTRYCODE');
            $response = $this->bridge->vouchervalid($gift, $pin, $amount);
            $returnCode = $response->getStatusCode();

            //print_r($response);
            //echo $returnCode;
            //exit;

            switch ($returnCode) {
                case 200:

                    $xml = @simplexml_load_string($response->getBody()->getContents());
                    $dataValue['VoucherNumber'] = (int) ($xml->VoucherNumber);
                    $dataValue['gift_pin'] = $pin;
                    $dataValue['ExpiryDate'] = $xml->ExpiryDate;
                    $dataValue['ValidationId'] = $xml->ValidationId;
                    $dataValue['Amount'] = $amount;
                    break;

                case 403 :
                    echo "Incorrect Voucher";
                    $dataValue = false;
                    break;

                default:
                    $result = "<hr>HTTP ERROR -> " . $returnCode . "<br>" . $response->getBody();
                    $data = array(
                        'api_name' => 'Gift certificate',
                        'URL' => $url,
                        'Result' => $result,
                        'Parameters' => '',
                    );
                    Mail::to(config('site.notify_email'))
                            ->cc(config('site.syg_notify_email'))
                            ->send(new OrderAp21Alert($this->order, $data));
                    $dataValue = false;
                    break;
            }
        }
        return $dataValue;
    }

}
