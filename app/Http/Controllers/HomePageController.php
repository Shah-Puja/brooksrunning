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
        $shoe_info = array('120286_615','110298_429','120291_073','110302_040','120285_542','110297_081');
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
