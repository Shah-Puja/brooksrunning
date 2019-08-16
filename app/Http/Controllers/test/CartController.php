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
            $this->cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first() ?? new Cart;
    }

    public function show() {
        if(env('AP21_STATUS') == "ON"){
            $this->cart->cart_api($this->bridgeObject);
        }else{
            $this->cart->cart_without_ap21();
        }
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb')->first() ?? new Cart;
        return view('cart.cart', ['cart'=> $cart]);
    }
}
