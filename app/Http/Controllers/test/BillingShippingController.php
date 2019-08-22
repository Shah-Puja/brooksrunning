<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class BillingShippingController extends Controller
{
    protected $cart;
    public function __construct()
    { 
        $this->middleware(function ($request, $next) {
            $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
            if(empty($this->cart) || $this->cart->cartItems->count() < 1)  return redirect('cart');
            return $next($request);
        });
    }

    public function create()
    {
        if (@$this->cart->order->address) $orderAddress = $this->cart->order->address;

        if (!@$orderAddress && auth()->check() ) {
            $usersLastOrder = Order::where('user_id', auth()->id())->orderBy('updated_at', 'desc')->first();
            $orderAddress = $usersLastOrder ? $usersLastOrder->address : null; 
        }
        
        if (!@$orderAddress)  $orderAddress = new Order_address;
        return view( 'customer.shipping', compact('orderAddress','cart') );
    }
}
