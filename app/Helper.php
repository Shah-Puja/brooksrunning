<?php

if (!function_exists('benefit_img_check')) {
    function benefit_img_check($img) 
    { 
        if($img!=''){
            $img = explode(",",$img); 
            $img1 = env('BASE_MEDIA_BENEFITS_IMAGES_URL').$img[0];
            $img2 = env('BASE_MEDIA_BENEFITS_IMAGES_URL').$img[1];
            if(@fopen($img1,'r')){
                $img_url = $img1;
            }else if(@fopen($img2,'r')){
                $img_url = $img2;
            }else{
                $img_url = "";
            }
        }else{
            $img_url = "";
        }

        return $img_url;
    } 
}