<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Payments\Processor;

class PaymentController extends Controller
{
    protected $cart; 
	protected $order;    
 	protected $processor;

    public function __construct(Processor $processor)
	{
        $this->middleware(function ($request, $next) {

            $this->cart = Cart::where( 'id', session('cart_id') )->first();
           
            if ( ! $this->cart || $this->cart->items_count < 1 ) {
                return redirect('cart');
            }
		
            $this->order = $this->cart->order;
            
            

			if ( ! $this->order ) {
                return redirect('shipping');
            }
            //echo "<pre>";print_r($this->order);echo "</pre>";exit;
			if ( ! $this->order->address->isValid() ) {
                return redirect('shipping');
            }
           echo "<pre>";echo "hi";echo "</pre>";exit;
//            if ( $this->order->getItemsCount() != $this->cart->items_count ) {
//                return redirect('cart');
//            }

            return $next($request);

        });
		$this->processor = $processor;
    }
    
    public function create(){
        return view( 'customer.payment', [
            'clientToken' => $this->processor->getToken(), 
            'cartGrandTotal' => $this->order->grand_total,
        ]);
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
        // Cache::forget( 'cart'  . $this->order->cart_id );
        // $this->cart->delete();
        // session()->forget('cart_id');

        // $order = $this->order->load('orderItems.variant.product', 'address');

        // event(new OrderReceived($order));

        //return view( 'customer.orderconfirmed', compact('order') );
        return view( 'customer.orderconfirmed');
    }
}
