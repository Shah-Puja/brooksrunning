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
            $this->cart->gift_voucher($this->bridgeObject,$this->cart->pin,$this->cart->gift_id);
        }else{
            $this->cart->cart_without_ap21();
        }
    
        $cart = $this->cart->load('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb') ?? new Cart;
        if (isset($cart->promo_code) && $cart->promo_code != "") {
            $promo_code = promo_mast::where('promo_string', $cart->promo_code)->first();
            $cart['promo_display_text'] = $promo_code->promo_display_text;
        }
        if ($cart->discount == 0 && $cart->promo_code == "HEROES") {
            $cart['subcode_text'] = "This promotion code does not apply to your product selection.";
        }
        return view('cart.cart', ['cart'=> $cart]);
    }

    public function check_valid_gift_voucher(Request $request) {
        if(env('AP21_STATUS') == "ON"){
            $status = $this->cart->gift_voucher($this->bridgeObject,$request->voucher_pin,$request->voucher_number);
        }else{
            $status = "Incorrect Voucher";
        }
        echo $status;
    }

    public function couponvalidate(Request $request) {
        $check_promo_code = $this->cart->get_promo_data($request->promo_code);
        $promotion = [];
        if (isset($check_promo_code) && $check_promo_code != "") {

            $this->cart->promo_code =  $check_promo_code['promo_code'];
            $this->cart->promo_string =  $check_promo_code['promo_string'];
            $this->cart->sku =  $check_promo_code['skuidx'];
            $this->cart->save();
            
            $promotion['result'] = 'success';
            $promotion['msg'] = 'Valid Code';
            $promotion['url'] = 'cart';
            $promotion['redirect'] = 1;
        } else {
            $promotion['result'] = 'fail';
            $promotion['msg'] = 'Discount Code is not valid';
            $promotion['redirect'] = 0;
        }
        echo json_encode($promotion);
    }

    public function update_delivery_option() {
        
        if ($this->cart->cartItems->count() > 0) {
            $cart_total = $this->cart->total;
            $delivery_option = request('delivery_option_value');
            switch ($delivery_option) {
                case "express":
                    $freight_charges = 15;
                    break;
                case "new_zealand":
                    $freight_charges = 25;
                    break;
                default:
                    if ($cart_total <= 50) {
                        $freight_charges = 10;
                    } else {
                        $freight_charges = '0.00';
                    }
            }
            $this->cart->delivery_type = $delivery_option;
            $this->cart->freight_cost = $freight_charges;
            $this->cart->grand_total = $freight_charges + $cart_total;
            $this->cart->save();
            echo "success";
        }
    }

    public function get_cart_order_total() {

        if ($this->cart->cartItems->count() > 0) {
            if ($this->cart->pin != "") {
                $AvailableAmount = $this->cart->gift_available_amount;
                $cartTotal = $this->cart->total;
                $freight_cost = $this->cart->freight_cost;
                if ($AvailableAmount > ($cartTotal + $freight_cost)) {
                    $gift_discount = ($cartTotal + $freight_cost);
                    $gift_cart_total = 0;
                } else {
                    $gift_discount = $AvailableAmount;
                    $gift_cart_total = ($cartTotal + $freight_cost) - $AvailableAmount;
                }
                
                $this->cart->gift_discount = $gift_discount;
                $this->cart->gift_cart_total = $gift_cart_total;
                $this->cart->save();

                $cart = $this->cart->load('cartItems.variant.product:id,gender,stylename,color_name,cart_blurb') ?? new Cart;
            }
        }
        return view('cart.order_summary', compact('cart'));
    }

    public function remove_gift_voucher(Request $request) {
        
        $this->cart->gift_id = '';
        $this->cart->pin = '';
        $this->cart->gift_available_amount = 0;
        $this->cart->gift_discount = 0;
        $this->cart->gift_cart_total = 0;
        $this->cart->save();

        echo "success";
    }

    public function removecoupon(Request $request) {
        
        $this->cart->promo_code = '';
        $this->cart->promo_string = '';
        $this->cart->sku = 0;
        $this->cart->save();
        
        return redirect('cart');
    }
}
