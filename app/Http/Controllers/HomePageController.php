<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Promo_banners;

class HomePageController extends Controller
{

    public function index(){
           
        //Featured product(homepage slider)
        $shoe_info = array('120285_027','110297_419','120272_585','110283_449','120284_080','110294_010','110288_428','120277_017');
        $product=[];
        foreach($shoe_info as $item){
            $slider_shoe = explode('_', $item); 
            $product[] =  product::where(
                [
                    ['color_code', '=', $slider_shoe[1]],
                    ['style', '=', $slider_shoe[0]],
                ]
            )
            ->whereHas('variants' , function($query)  {
                return $query->where('visible', '=', 'Yes');
            })
            ->with('variants')
            ->first();            
        }
        /// Homepage banner 
        $banner = \App\Models\Promo_banners::where('active','Y')
                                ->where('banner_type','homepage-eoysale')
                                ->first();
        if((!empty($banner->start_date) && $banner->start_date!='0000-00-00 00:00:00') && (!empty($banner->end_date)  && $banner->end_date!='0000-00-00 00:00:00') ){
            $banner = ($banner->start_date <= now() && $banner->end_date >=now() ) ? $banner : '';
        }
        return view ('customer.index',compact('product','banner'));
    }

}
