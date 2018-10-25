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

            $person_data =  $this->bridge->getPersonid($this->order->address->email);
            echo "<pre>";
            print_r($person_data);
            echo "</pre>";
            exit;
            
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
    


}
