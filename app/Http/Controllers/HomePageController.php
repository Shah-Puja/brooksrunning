<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Promo_banners;
use Session;

class HomePageController extends Controller
{

    public function index(){

        if(url()->current()==env('MEDIBANK_GATEWAY_URL')):
            Session::put('medibank_gateway', 'Yes');
        else:
            Session::put('medibank_gateway', 'No');
        endif;

        //Featured product(homepage slider)
        // $shoe_info = array('120286_615','110298_429','120291_073','110302_040','120285_542','110297_081');
        // $shoe_info = array('120305_413','110316_489','110293_057','120282_057','120283_070','110296_015','120285_032','110297_424');
        $shoe_info = array('120284_058','110294_429','120272_049','110283_038','120305_177','110316_466','120283_070','110296_015','120298_053','110309_053');
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
                                ->where('banner_type','homepage-afterpaysale-aug2019')
                                ->first();
        if((!empty($banner->start_date) && $banner->start_date!='0000-00-00 00:00:00') && (!empty($banner->end_date)  && $banner->end_date!='0000-00-00 00:00:00') ){
            $banner = ($banner->start_date <= now() && $banner->end_date >=now() ) ? $banner : '';
        }
        return view ('customer.index',compact('product','banner'));
    }

    public function medibank_check_user(){
        if(Session::get('medibank_gateway')!='No'){
            Session::put('medibank_user','Yes');
            return 'true';
        }else{
            return 'false';
        }
       
    }


}
