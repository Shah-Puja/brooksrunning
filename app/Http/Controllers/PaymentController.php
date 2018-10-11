<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Payments\Processor;
use App\Events\OrderReceived;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderSubmittedNotification;
use App\Payments\AfterpayProcessor;
use App\Payments\AfterpayApiClient;


class PaymentController extends Controller
{
    protected $cart; 
	protected $order;    
    protected $processor;
    protected $afterpay_processor;

    public function __construct(Processor $processor)
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
    }
    
    public function create(){
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
    
        return view( 'customer.payment', [
            'clientToken' => $this->processor->getToken(), 
            'cartGrandTotal' => $this->order->grand_total,
        ], compact('cart'));
    }

    public function create_token(AfterpayProcessor $afterpay_processor){
        $order=array(); 
        $orders = Order::where('cart_id', session('cart_id'))->first(); 
        //Get orders info, address, name, email, total_amount 
        $get_afterpay_token = json_decode($afterpay_processor->getAfterpayToken($orders));
        $token = $get_afterpay_token->token;
        $get_order_details = $afterpay_processor->getOrder($token);
        $order_details = array();
        $order_details['id'] = $orders->id;
        $order_details['afterpayToken'] = $token;
        $charge_payment = $afterpay_processor->charge($order_details);
        return $charge_payment;
        //echo "<pre>";print_r($get_order_details);die;
    }

    public function afterpay_success(){
        echo "Success";
    }

    public function afterpay_cancel(){
        echo "Cancelled Payment";
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
        
        Cache::forget( 'cart'  . $this->order->cart_id );
        $this->cart->delete();
        session()->forget('cart_id');
        
        $order = $this->order->load('orderItems.variant.product', 'address');
    
        event(new OrderReceived($order));

        return view( 'customer.orderconfirmed', compact('order') );
    }

    public function afterpay_payment($request){
        echo "eeeeeee";die;
    }
}
