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
        if(env('AP21_STATUS') == "ON"){
            $this->cart->cart_api($this->bridgeObject);
            $this->cart->gift_voucher($this->bridgeObject,$this->pin,$this->gift_id);
        }else{
            $this->cart->cart_without_ap21();
        }
        $cart = $this->cart->load('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb') ?? new Cart;
        return view('cart.cart', ['cart'=> $cart]);
    }

    public function check_valid_gift_voucher(Request $request) {
        if(env('AP21_STATUS') == "ON"){
            $status = $this->cart->gift_voucher($this->bridgeObject,$request->voucher_pin,$request->voucher_number);
        }else{
            $status = "Incorrect Voucher";
        }
        return $status;
    }
}
