<?php

if (!function_exists('benefit_img_check')) {
    function benefit_img_check($img) 
    { 
        if($img!=''){
            $img = config('site.image_url.base_banefit').$img;

            if(@fopen($img.".png",'r')){
                $img_url = $img.".png";
            }else if(@fopen($img.".jpg",'r')){
                $img_url = $img.".jpg";
            }else{
                //$img_url = "/images/no_image.png";
                $img_url = "";
            }
        }else{
            //$img_url = "/images/no_image.png";
            $img_url = "";
        }

        return $img_url;
    } 
}