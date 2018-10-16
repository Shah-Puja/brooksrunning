<?php

if (!function_exists('benefit_img_check')) {
    function benefit_img_check($img) 
    { 
        if($img!=''){
            $img = env('BASE_MEDIA_BENEFITS_IMAGES_URL').$img;

            if(@fopen($img.".png",'r')){
                $img_url = $img.".png";
            }else if(@fopen($img.".jpg",'r')){
                $img_url = $img.".jpg";
            }else{
                $img_url = "/images/no_image.png";
            }
        }else{
            $img_url = "/images/no_image.png";
        }

        return $img_url;
    } 
}