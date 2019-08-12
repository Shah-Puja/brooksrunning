<?php

namespace App\Http\Controllers\test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cart_item;
use App\SYG\Bridges\BridgeInterface as Bridge;

class CartController extends Controller
{   
    protected $cart;
    public function __construct(Bridge $b) {
        $this->bridgeObject = $b;
        $this->middleware(function ($request, $next) {
            $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first() ?? new Cart;
            return $next($request);
        });
    }

    public function show() {
        $this->cart->cart_api($this->bridgeObject);
        return view('cart.cart', ['cart'=> $this->cart]);
    }
}
