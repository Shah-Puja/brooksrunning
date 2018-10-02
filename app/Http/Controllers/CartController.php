<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
class CartController extends Controller {
    
    public function show() {
        //session(['cart_id' => '1']); //comment this static after add to cart functionality
        //echo "<pre>";print_r(session()->all());die;
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
        
        foreach($cart->cartItems as $cart_item){
            //echo "<pre>";print_r();die;
            $cart['items_count'] += $cart_item->qty;
        }
        //echo "<pre>";print_r($cart);die;
        if ($cart && !$cart->verifyItems()) {
            $cart->deleteUnavaliableItems();
        }
        return view('cart.cart', compact('cart'));
    }

    public function update_delivery_option(){ 
        $delivery_option = request('delivery_option_value');
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
       
        $cart_total = $cart->total;
        if ($delivery_option == 'express') {
            $freight_charges = '15';
            //config('site.freight_cost')
        } else if ($delivery_option == 'new_zealand') {
            $freight_charges = 25; 
        } else {
            if ($cart_total <= 50) {
                $freight_charges = 10;
            } else {
                $freight_charges = '0.00';
            }
        }
        echo session('cart_id');
        $UpdateDetails =  Cart::where('id', session('cart_id'))->update(['delivery_type' => $delivery_option,'freight_cost' => $freight_charges, 'grand_total'=> $freight_charges + $cart->total]);
        echo "success";
    }

    public function get_cart_order_total(){
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,stylename,color_name')->first();
        return view('cart.order_summary', compact('cart'));
    }

}
