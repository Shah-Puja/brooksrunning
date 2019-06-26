<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        $array = ['120292_030','120291_073','110303_008','110302_040'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        }   
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->get();
            
        $products = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        })->unique('style');
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_listing',compact('colour_options','products'));
    }

    public function adreline_ghost(){
        $array = ['110294_096','120284_096','120284_484','120277_495','110288_096'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        }   
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        })->unique(function ($item) {
            return $item['style'].$item['color_code'];
        });
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_adrenaline_ghost',compact('colour_options','products'));
    }

    public function mothers_day(){
        $women_running_shoes = \App\Models\Product::getProducts_array(['120277_406','120279_509','120284_028','120287_531','120292_030','120285_092']);
        $women_running_clothing = \App\Models\Product::getProducts_array(['221364_563', '221255_182','221135_182','221221_594','221349_561','221350_182']);
        $sports_bras = \App\Models\Product::getProducts_array(['350064_568','350037_052','350071_001']);
        $accessories = \App\Models\Product::getProducts_array(['280404_517','280356_520','280409_081']);
        $products = '';
        $colour_options ='';
        return view( 'customer.collection_mothers_day_listing',compact('women_running_shoes','women_running_clothing','sports_bras','accessories','colour_options','products'));
    }

    public function energize_collection(){
        $support_shoes = \App\Models\Product::getProducts_array(['120272_321','110283_449','120286_615','110298_429']);
        $neutral_shoes = \App\Models\Product::getProducts_array(['110290_057', '120279_520','110293_428','120282_080','110297_488','120285_542','110295_493','120288_080']);
        $products = '';
        $colour_options ='';
        return view( 'customer.collection_energize_listing',compact('support_shoes','neutral_shoes','colour_options','products'));
    }

    public function shoes_for_nurses(){
        $array = ['120284_071','110294_071','620047_001','610060_001','120305_040','110316_040','110296_057','120283_070','120287_080','110299_092','120275_447','110286_064','110039_001','120032_001','620047_001','610060_001'];
        $data_array = [];
        foreach($array as $item){
            $item = explode('_',$item);
            $style = $item[0];
            $color_code = $item[1];
            $data_array[] = array('style'=> $style,'color_code'=> $color_code);
        } 
        $orderby_style_string = implode("','",collect($data_array)->pluck('style')->toArray());
        $orderby_color_string = implode("','",collect($data_array)->pluck('color_code')->toArray());  
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                        ->whereHas('variants', function ( $query ) {
                                            $query->where('visible', '=', 'Yes');
                                    })
                                    ->with('variants')
                                    ->orderByRaw("FIELD(style ,'$orderby_style_string') ASC,FIELD(color_code ,'$orderby_color_string') ASC")
                                    ->get();
            
        $products = $styles->filter(function ($value, $key) use ($data_array) {
                $data=[];
                foreach($data_array as $value_array){
                        if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                            $data[] = $value;
                        }
                }
            return $data;
        })->unique('style');
        
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });

        return view( 'customer.collection_shoes_for_nurses',compact('colour_options','products'));
     }
}
