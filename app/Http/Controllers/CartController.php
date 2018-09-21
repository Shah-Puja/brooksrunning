<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;

class CartController extends Controller {

    public function show() {
        session(['cart_id' => '1']); //comment this static after add to cart functionality
        //echo "<pre>";print_r(session()->all());die;
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
        //echo "<pre>";print_r($cart);die;
        
        if ($cart && !$cart->verifyItems()) {
            $cart->deleteUnavaliableItems();
        }
        return view('cart.cart', compact('cart'));
    }

}
