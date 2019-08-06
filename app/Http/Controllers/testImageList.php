<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class testImageList extends Controller
{
    //
    
public function index(){
    echo "Hi";
    $benefits_folder="public_html/media/benefits/";
    $filename="Cascadia_14_M_RTB-1.jpg";
    //$filename="PDP_110258_GLYCERIN_Video_Desktop.png";

    //Cache::forget('benefits_image_list');

    Cache::remember('benefits_image_list', 1, function() {        
        echo "<br> Cache is getting set";
        return Storage::disk('sftp')->files('public_html/media/benefits/');
        //benefits
    });

    if (Cache::has('benefits_image_list')){
        $files=Cache::get('benefits_image_list');
        //echo "<pre>".print_r($files)."</pre>";
        if (in_array($benefits_folder.$filename,$files)){
            echo "<br> $filename exists";         
        }else{
            echo "<br> $filename does not exists ";        
        }
        /*foreach($files as $file){
            echo "<br> - $file";
        }*/
    }
    /* else {
        Cache::put('benefits_image_list', $values, 10);
    }*/

/*
    if( Cache::has('cachekey') ) {
		return Cache::get( 'cachekey' );
    } else{
        Cache::put( 'cachekey', 'I am in the cache baby!', 1 );
        return "Cache varaible set";
    }
*/    
    /*    
    //$fname="public_html/media/benefits/Cascadia_14_M_RTB-1.jpg";
    $fname="public_html/media/benefits/PDP_110258_GLYCERIN_Video_Desktop.png";
    if(Storage::disk('sftp')->exists($fname)){
        echo "<br> $fname exists ";        
    }
    else{
        echo "<br> $fname does not exists ";        
    } 
    */   
/*
    $files = Storage::disk('sftp')->files('public_html/media/benefits/');
    
    foreach($files as $file){
        echo "<br> - $file";
    }*/
    

}
}
