<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_log;
use App\Models\Order_number;
use App\Payments\Processor;
use App\Events\OrderReceived;
use App\Mail\OrderConfirmation;
use App\Mail\OrderAlert;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSubmittedNotification;
use App\Payments\AfterpayProcessor;
use App\Payments\AfterpayApiClient;
use App\SYG\Bridges\BridgeInterface;


class PaymentController extends Controller
{
    protected $cart; 
	protected $order;    
    protected $processor;
    protected $afterpay_processor;
	protected $bridge;

    public function __construct(Processor $processor, BridgeInterface $bridge)
	{
        $this->middleware(function ($request, $next) {

            $this->cart = Cart::where( 'id', session('cart_id') )->first();

            if(isset($this->cart) && !empty($this->cart)){
                foreach($this->cart->cartItems as $cart_item){ 
                    $this->cart['items_count'] += $cart_item->qty;
                }
            }
            if ( ! $this->cart || $this->cart->items_count < 1 ) {
                return redirect('cart');
            }
		
            $this->order = $this->cart->order;
            
			if ( ! $this->order ) {
                return redirect('shipping');
            }
            
			if ( ! $this->order->address->isValid() ) {
                return redirect('shipping');
            }
        
           if ( $this->order->getItemsCount() != $this->cart->items_count ) {
               return redirect('cart');
           }

            return $next($request);

        });
        $this->processor = $processor;
        $this->bridge = $bridge;
    }
    
    public function create(){
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
    
        return view( 'customer.payment', [
            'clientToken' => $this->processor->getToken(), 
            'cartGrandTotal' => $this->order->grand_total,
        ], compact('cart'));
    }

    public function create_token(AfterpayProcessor $afterpay_processor){ 
        $get_afterpay_token = json_decode($afterpay_processor->getAfterpayToken($this->order));
        $token = $get_afterpay_token->token;  
        $this->order->update(array('afterpay_token' => $token));
        return $token;
    }

    public function afterpay_success(Request $request, AfterpayProcessor $afterpay_processor){ 
        if($request->status == "SUCCESS" && $request->orderToken != "" && $this->order->id != 0){ 
            $get_order_details = $afterpay_processor->getOrder($this->order->afterpay_token);
            $charge_payment = json_decode($afterpay_processor->charge($this->order), true);
             
            if (isset($charge_payment['status']) && $charge_payment['status'] == "APPROVED" && $charge_payment['token'] != "") {
                $transaction_id = $charge_payment['id'];
                $this->order->update(array('status' => 'Order Completed', 'transaction_id' => $transaction_id,  'transaction_status'  => 'Succeeded', 'payment_status' => Carbon::now()));
                Cache::forget( 'cart'  . $this->order->cart_id );
                $this->cart->delete();
                session()->forget('cart_id'); 
                $order = $this->order->load('orderItems.variant.product', 'address');
                event(new OrderReceived($order));
                return view( 'customer.orderconfirmed', compact('order') );
            } else{
                $this->order->update(array('status' => 'Order Declined', 'transaction_status'  => 'Incomplete', 'payment_status' => Carbon::now()
                ));
                return redirect('/payment')->with('afterpay_cancel', 'AfterPay Cancel');
            }
        } else{
            return redirect('/cart');
        }
    }

    public function afterpay_cancel(Request $request){
        $this->order->update(array('status' => 'Order Incomplete','transaction_status'  => 'Incomplete','payment_status' => Carbon::now()));
        return redirect('/payment')->with('afterpay_cancel', 'AfterPay Cancel'); 
        
    }

    public function store(){
        if (! $this->order->canBeFinalised() ) {
			return redirect('cart')->withErrors(['cart' => 'Some items not available any more']);
        }

        $transation_result = $this->processor->charge($this->order);
		$this->order->updateOrder($transation_result);
        
        if (! $transation_result ) {
            return back()->withErrors(['payment' => 'Payment Failed']);
        }

        // echo "<pre>";
        // print_r($transation_result);
        // echo "</pre>";
        // exit;

        if($transation_result->processorResponseCode =="1000" && $transation_result->processorResponseText=="Approved"){
            $order_id = $transation_result->orderId;
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

            $logger = array(
                'order_id'      => $order_id,
                'log_title'     => $log_title,
                'log_type'      => $log_type,
                'log_status'    => $log_status,
                'result'        => $orderReport,
                'xml'           => (!empty($xml))? $xml:'',
                'nab_txnid'     => $transaction_id,
                'nab_result'    => $braintree_result
            );
            Order_log::insert($logger);

            $result = $this->process_order($order_id, $payment, $orderReport, $transaction_id, $timestamp);

            Cache::forget( 'cart'  . $this->order->cart_id );
            $this->cart->delete();
            session()->forget('cart_id');

            $order = $this->order->load('orderItems.variant.product', 'address');
            //event(new OrderReceived($order));
            return view( 'customer.orderconfirmed', compact('order') );
            
        }
        else{
            $order_id = $transation_result->orderId;
            $orderCheck = $this->checkOrderMast_prev($order_id);
            if ($orderCheck) {

                $order_no = $this->addOrderNo($order_id);
                if (empty($order_no)) {
                    $order_no = $order_id;
                }

                Cache::forget( 'cart'  . $this->order->cart_id );
                $this->cart->delete();
                session()->forget('cart_id');

                $order = $this->order->load('orderItems.variant.product', 'address');
                //event(new OrderReceived($order));
                return view( 'customer.orderconfirmed', compact('order') );

            } else {

                $nab_result = "Failed";
                // $transaction = $transation_result->transaction;
                $transaction_id = $transation_result->id;
                // $vault_result_message = $transation_result->message;
                $order_id = $transation_result->orderId;

                $check_transaction_status = $this->checkOrderMastTransStatus($order_id);
                if ($check_transaction_status == "Succeeded") {
                    
                    // if (isset($_SESSION["cart_id"])) {
                    //     session()->forget('cart_id');
                    // }
                    $order_no = $this->addOrderNo($order_id);
                    if (empty($order_no)) {
                        $order_no = $order_id;
                    }

                    Cache::forget( 'cart'  . $this->order->cart_id );
                    $this->cart->delete();
                    session()->forget('cart_id');

                    $order = $this->order->load('orderItems.variant.product', 'address');
                    //event(new OrderReceived($order));
                    return view( 'customer.orderconfirmed', compact('order') );
                    
                } else {

                    $orderDataUpdate = array(
                        'trans_status' => 'Braintree Processor Declined'
                    );
                    Order::where('id', $order_id)->update($orderDataUpdate);

                    $orderReport = $_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];
                    $transaction_id = $transation_result->id;
                    $log_title = "Braintree Payment";
                    $log_type = "Response";
                    $log_status = "Braintree Processor Declined";
                    $nab_result = "Failed";

                    $logger = array(
                        'order_id'      => $order_id,
                        'log_title'     => $log_title,
                        'log_type'      => $log_type,
                        'log_status'    => $log_status,
                        'result'        => $orderReport,
                        'xml'           => (!empty($xml))? $xml:'',
                        'nab_txnid'     => $transaction_id,
                        'nab_result'    => $braintree_result
                    );
                    Order_log::insert($logger);

                    $order_no = $this->addOrderNo($order_id);
                    if (empty($order_no)) {
                        $order_no = $order_id;
                    }

                    //return view( 'customer.orderconfirmed', compact('order') );
                    echo "Braintree Processor Declined";exit;


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

    public function process_order($order_id, $payment, $orderReport, $transaction_id, $timestamp){
        
        $orderIdData = Order::where("id", "=",  $order_id)->first();
        if($orderIdData->status == "Order Completed"){

            $this->addOrderNo($order_id);
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
                        'nab_trans_id' => $transaction_id,
                        'nab_order_dt' => date('Y-m-d H:i:s'),
                        'payment_status' => date('Y-m-d H:i:s')
                    );
                    break;
            }
            
            Order::where('id', $order_id)
            ->update($orderDataUpdate);
			
			//ap21 order process 
            $PersonID = $this->get_personid($this->order->address->email);
            if(!empty($PersonID)){
                $this->ap21order($PersonID);
            }
            return true;
        }
    
    }

    public function addOrderNo($order_id){
        $order_no = 0;
        if($_ENV['APP_ENV'] != "local"){
            $order_data = array(
                'order_id' => $order_id
            );
            $order_number_insert = Order_number::create($order_data);
            $order_no = $order_number_insert->id;

            if (!empty($order_no)) {
                $status = 'Order Number';
            
                Order::where('id', $order_id)
                ->update(['status' => $status]);
            }

            Order::where('id', $order_id)
            ->update(['order_no' => $order_no]);

        }
        else{

            $order_no = "test-$order_id";

            Order::where('id', $order_id)
            ->update(['order_no' => $order_no]);

        }
        return $order_no;
    }

    public function checkOrderMast_prev($order_id){
        $returnVal = false;
        $result = Order::where([
            ['id', '=', $order_id],
            ['status', '=', 'Order Completed']
        ])->get();

        if ($result->count()) {
            $returnVal = true;
        }else{
            $returnVal = false;
        }

        return $returnVal; 
    }

    public function checkOrderMastTransStatus($order_id){
        $transaction_status="";
        $result = Order::where(['id', '=', $order_id])->get();

        if ($result->count()) {
            $transaction_status= $result->transaction_status;
        }else{
            $returnVal = '';
        }

        return $transaction_status; 
    }

    
    public function get_personid($email){
       
        $response =  $this->bridge->getPersonid($email);
        //print_r($response);
        //exit;      
            $returnCode =  $response->getStatusCode();
            $userid = false;
            switch ($returnCode) {
                case '200':
                    $response_xml = @simplexml_load_string($response->getBody()->getContents());
                    $userid = $response_xml->Person->Id;
                    $logger = array(
                        'order_id'      => $this->order->id,
                        'log_title'     => 'Person',
                        'log_type'      => 'Response',
                        'log_status'    => 'Person Id Found',
                        'result'        =>  $userid,
                    );
                    Order_log::createNew($logger);
                    $URL = env('AP21_URL')."/Persons/?countryCode=AUFIT&email=" . $email;
                    $data = array(
                        'api_name'     => 'Get PersonID Error',
                        'URL'      => $URL,
                        'Result'    => $userid,
                        'Parameters'        => '',
                    );
                    Mail::to('trunaltamore@gmail.com')->send(new OrderAlert($this->order->$data));
                    $returnVal = $userid; 
                    break;

                case '404':
                    $userid = $this->create_user();
                    break;

                default:
                    $logger = array(
                        'order_id'      => $this->order->id,
                        'log_title'     => 'Person',
                        'log_type'      => 'Response',
                        'log_status'    => 'Error While Getting Person ID',
                        'result'        =>  $result,
                    );
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" .$response->getBody()->getContents();
                    Order_log::createNew($logger);
                    //$URL = env('AP21_URL')."/Persons/?countryCode=AUFIT&email=" . $email;
                    //Mail::to('trunaltamore@gmail.com')->send(new OrderAlert());
                    $userid = false;
                    break;
            }
        return $userid;

    }
    public function create_user(){

        $fullname = $this->order->address->b_fname.' '.$this->order->address->b_lname;
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

        $person_xml="<Person>
                        <Firstname>$firstname</Firstname>
                        <Surname>$lastname</Surname>
                        <Contacts>
                          <Email>".$this->order->address->email."</Email>
                          <Phones>
                            <Home>".$this->order->address->s_phone."</Home>
                          </Phones>
                        </Contacts>
                        <Addresses>
                            <Billing>
                              <AddressLine1>".htmlspecialchars($this->order->address->b_add1)."</AddressLine1>
                              <AddressLine2>".htmlspecialchars($this->order->address->b_add2)."</AddressLine2>
                              <City>".htmlspecialchars($this->order->address->b_city)."</City>
                              <State>".htmlspecialchars($this->order->address->b_state)."</State>
                              <Postcode>".$this->order->address->b_postcode."</Postcode>
                              <Country></Country>
                            </Billing>
                            <Delivery>
                              <AddressLine1>".htmlspecialchars($this->order->address->s_add1)."</AddressLine1>
                              <AddressLine2>".htmlspecialchars($this->order->address->s_add2)."</AddressLine2>
                              <City>".htmlspecialchars($this->order->address->s_city)."</City>
                              <State>".htmlspecialchars($this->order->address->s_state)."</State>
                              <Postcode>".$this->order->address->s_postcode."</Postcode>
                              <Country></Country>
                            </Delivery>
                        </Addresses>
                      </Person>";

        $response = $this->bridge->processPerson($person_xml);
        $URL = env('AP21_URL')."Persons/?countryCode=AUFIT";
        $logger = array(
            'order_id'      => $this->order->id,
            'log_title'     => 'Person',
            'log_type'      => 'Response',
            'log_status'    => 'Generate Person XML',
            'result'        => 'Created Person xml and submitted to app21 url:- ' . $URL,
            'xml'           => $person_xml
        );
        Order_log::createNew($logger);
        $returnCode =  $response->getStatusCode();
            switch ($returnCode) {
                case 201:
                    $location=$response->getHeader('Location')[0];
                    $str_arr = explode("/", $location);
                    $last_seg = $str_arr[count($str_arr) - 1];
                    $last_seg_arr = explode("?", $last_seg);
                    $person_idx = $last_seg_arr[0];

                    $logger = array(
                        'order_id'      => $this->order->id,
                        'log_title'     => 'Person',
                        'log_type'      => 'Response',
                        'log_status'    => '201 Person ID Created',
                        'result'        =>  $person_idx,
                    );
                    Order_log::createNew($logger);
                     //$this->alert->order_log($this->_order_id, 'Person', 'Response', '201 Person ID Created', $person_id);
                    // Logger

                    $returnVal = $person_idx;

                   
                    break;

                default:
                    $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();
                    $logger = array(
                        'order_id'      => $this->order->id,
                        'log_title'     => 'Person',
                        'log_type'      => 'Response',
                        'log_status'    => 'Error While Creating Person ID',
                        'result'        =>  $result,
                    );
                    Order_log::createNew($logger);
                   // $this->alert->ap21_error($this->_order_id, 'Create Person Error', $URL, $result, $person_xml);
                    // Send ap21 alert  

                    $returnVal = false;

                    break;
        }
       
        return  $returnVal;
    }

    public function ap21order($person_id){
        
        $returnVal = false;
        $returnData = array();
        $returnOrderNum = $this->order->id;
        $OrderNum = $this->order->order_no;
        $add_description = '';
        $ordernum = "BRN-" . $OrderNum;

        /*if (!empty($order_data['coupon_code'])) {
            $add_description .= ' Coupon Code :- ' . $order_data['coupon_code'];
        }

        if (!empty($order_data['giftcert_code'])) {
            $add_description .= ' Gift Code :- ' . $order_data['giftcert_code'];
        }*/

        if (!empty($this->order->nab_trans_id)) {
            $add_description .= ' Transaction Id :- ' . $this->order->nab_trans_id;
        }

        $fullname = $this->order->address->b_fname.' '.$this->order->address->b_lname;
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
        $xml_data.="<DeliveryInstructions>" . $add_description . "</DeliveryInstructions>";
        $xml_data.="<Addresses>
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
            $value = $qty * $price;
            //$discount = ($order['coup_discount'] != 0) ? $order['coup_discount'] : 0;
            //$promo_code = $order['promo_code'];
            //$promo_string = $order['promo_string'];


            $xml_data.="
                        <OrderDetail>
                          <SkuId>$sku</SkuId>
                          <Quantity>$qty</Quantity>
                          <Price>$price</Price>";


            /*if (!empty($discount)) {
                $xml_data.="<Discounts> 
                                        <Discount>
                                            <DiscountType>ManualDiscount</DiscountType>
                                            <DiscountTypeId>1</DiscountTypeId>
                                            <ReasonId>720</ReasonId>>";

                if ($promo_code == 'BROOKS30' && $promo_string != ''):
                    $xml_data.="<Description>$promo_string</Description>";
                else:
                    $xml_data.="<Description>$promo_code</Description>";
                endif;
                $xml_data.= "<Value>$discount</Value>
                                        </Discount>
                                    </Discounts>";
            }*/

            $xml_data.=" <Value>$value</Value>
                        </OrderDetail>";
            $i++;

            $subtotal += $value;
        }

        if (!empty($this->order->freight_cost) && $this->order->freight_cost != 0) {
            $xml_data.="<OrderDetail>
                                  <SkuId>2542</SkuId>
                                  <Quantity>1</Quantity>
                                  <Price>" . $this->order->freight_cost . "</Price> 
                                  <Value>" . $$this->order->freight_cost . "</Value>
                                </OrderDetail>";
            $subtotal += $this->order->freight_cost;
        }

        $xml_data.="
                </OrderDetails>";
        $xml_data.="<Payments>";
        //$gift_data = $this->voucher->giftVoucherGvvalid($this->_app21_url, $this->_country_code, $order_id);


        /*if ($gift_data) {

            $gift_amount = $order_data['gift_amount'];
            $subtotal = $subtotal - $gift_amount;

            $xml_data.=" <PaymentDetail>
                                <Origin>GiftVoucher</Origin>
                                <VoucherNumber>" . $gift_data['VoucherNumber'] . "</VoucherNumber>
                                <ValidationId>" . $gift_data['ValidationId'] . "</ValidationId>
                                <Amount>" . $gift_amount . "</Amount>
                            </PaymentDetail>";



            $subtotal = number_format($subtotal, 2);
        }*/

        $xml_data.="<PaymentDetail>
                            <Id>7781</Id>
                            <Origin>CreditCard</Origin>
                            <CardType>MASTERCARD / VISA</CardType>
                            <Stan>986516</Stan>
                            <AuthCode/>
                            <AccountType/>
                            <Settlement>20111129</Settlement>";

        if (!empty($this->order->nab_trans_id)) {
            $xml_data.="<Reference>" . $this->order->nab_trans_id . "</Reference>";
        } else {
            $xml_data.="<Reference>Ref1</Reference>";
        }

        $xml_data.="<Amount>" . $subtotal . "</Amount>";
        $xml_data.="<Message>payment_statusCURRENTbank_</Message>";
        $xml_data.="</PaymentDetail>";
        $xml_data.="</Payments>";

        $xml_data.="</Order>";
        $this->order->updateOrder_xml($xml_data);
        $response = $this->bridge->processOrder($person_id,$xml_data);
    
        $returnCode =  $response->getStatusCode();
        switch ($returnCode) {
            case 201:
                $location=$response->getHeader('Location')[0];
                $str_arr = explode("/", $location);
                $last_seg = $str_arr[count($str_arr) - 1];
                $last_seg_arr = explode("?", $last_seg);
                $order_id = $last_seg_arr[0];
                $order_url =env('app21_url') . "/Persons/$person_id/Orders/$order_id?countryCode=AUFIT";

                $returnVal = $order_id;
                $logger = array(
                    'order_id'      => $this->order->id,
                    'log_title'     => 'Order',
                    'log_type'      => 'Response',
                    'log_status'    => '201 Order Created',
                    'result'        =>  $response->getBody(),
                    'xml'           =>  $xml_data
                );

                Order_log::createNew($logger);

                $orderDataUpdate = array(
                    'status' => 'Completed',
                    'app21_order' => $returnVal,
                    'app21_order_status' => date('Y-m-d H:i:s')
                );
                Order::where('id', $this->order->id)
                ->update($orderDataUpdate);

                break;
            case 400 :

                $returnVal = false;
                $logger = array(
                    'order_id'      => $this->order->id,
                    'log_title'     => 'Order',
                    'log_type'      => 'Response',
                    'log_status'    => '400 Order exists',
                    'result'        =>  $response->getBody(),
                );
                Order_log::createNew($logger);
                //$this->alert->ap21_error($order_id, 'Order Exists', $URL, $returnVal, $xml_data); // Send ap21 alert 

                break;

            default:

            $returnVal = false;
            $result = 'HTTP ERROR -> ' . $returnCode . "<br>" . $response->getBody();
                $logger = array(
                    'order_id'      => $this->order->id,
                    'log_title'     => 'Order',
                    'log_type'      => 'Response',
                    'log_status'    => 'Error While Creating Order',
                    'result'        =>  $result,
                );
                Order_log::createNew($logger);
                //$this->alert->ap21_error($order_id, 'Create Order Error', $URL, $returnVal, $xml_data); // Send ap21 alert 
                // Send ap21 alert  

                $returnVal = false;

                break;
        }
       
        return $returnVal;
    }

    


}
