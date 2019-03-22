<?php

use App\Models\Promo_mast;
use App\Models\Cart;

if (!function_exists('benefit_img_check')) {

    function benefit_img_check($img) {
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

if (!function_exists('check_promo_validity')) {

    function check_promo_validity($promo_string) {
        if (isset($promo_string) && $promo_string != '') {
            $promo_validity = promo_mast::where('promo_string', $promo_string)->whereRaw('CURDATE() between `start_dt` and `end_dt`')->first();
            if (empty($promo_validity)) {
                Cart::where('id', session('cart_id'))->update(['promo_code' => '', 'promo_string' => '', 'sku' => 0]);
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

}