<?php

use App\Models\Cart;
use App\Models\Order_address;
use App\Models\Order;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;


if (!function_exists('benefit_img_check')) {

    function benefit_img_check($img) {        
        
        Cache::remember('benefits_image_list', 60, function() {        
            //Cache will get reset after every 60 minutes
            return Storage::disk('sftp')->files('public_html/media/benefits/');            
        });

        $benefits_folder="public_html/media/benefits/";
        if ($img != '') {
            $png_filename = $benefits_folder.$img.".png";
            $jpg_filename = $benefits_folder.$img.".jpg";            

            if (Cache::has('benefits_image_list')){
                $files=Cache::get('benefits_image_list');                                
                if (in_array($png_filename,$files)){
                    return config('site.image_url.base_banefit') . $img.".png";                    
                }elseif(in_array($jpg_filename,$files)){                    
                    return config('site.image_url.base_banefit') . $img.".jpg";
                }else{
                    return "";
                }
            }else{
                return "";
            }
        }
    }

}

if (!function_exists('benefit_img_check_old')) {

    function benefit_img_check_old($img) {
        if ($img != '') {
            $img = config('site.image_url.base_banefit') . $img;

            if (@fopen($img . ".png", 'r')) {
                $img_url = $img . ".png";
            } else if (@fopen($img . ".jpg", 'r')) {
                $img_url = $img . ".jpg";
            } else {
                //$img_url = "/images/no_image.png";
                $img_url = "";
            }
        } else {
            //$img_url = "/images/no_image.png";
            $img_url = "";
        }

        return $img_url;
    }

}

/* if (!function_exists('check_state_and_update_delivery_option')) {

    function check_state_and_update_delivery_option() {
        $cart = Cart::where('id', session('cart_id'))->with('cartItems.variant.product:id,style,stylename,color_name')->first();
        if (isset($cart->order->address->s_state) && $cart->order->address->s_state == 'New Zealand') {
            $delivery_option = "new_zealand";
            $freight_charges = config('site.SHIPPING_NZ_PRICE');
            $grand_total = $cart->total + $freight_charges;
            Cart::where('id', session('cart_id'))->first()->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
            Order::where('cart_id', session('cart_id'))->first()->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
        }
    }

} */

if (!function_exists('check_state_and_update_delivery_option')) {

    function check_state_and_update_delivery_option($order_id) {
        $address = Order_address::where("order_id", "=", $order_id)->first();
        $order = Order::where("id", "=", $order_id)->first();
        if (isset($address->s_state) && $address->s_state == 'New Zealand') {
            $delivery_option = "new_zealand";
            $freight_charges = config('site.SHIPPING_NZ_PRICE');
            $grand_total = $order->total + $freight_charges;
            Cart::where('id', session('cart_id'))->first()->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
            Order::where('id', $order_id)->first()->update(['delivery_type' => $delivery_option, 'freight_cost' => $freight_charges, 'grand_total' => $grand_total]);
        }
    }

}