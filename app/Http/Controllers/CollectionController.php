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
                                    })->get();
            
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
        
        $style_array = collect($data_array)->pluck('style');
                  
        $styles = \App\Models\Product::whereIn("style",$style_array)
                                    ->whereHas('variants', function ( $query ) {
                                          $query->where('visible', '=', 'Yes');
                                    })->get();
            
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

        return view( 'customer.collection_adrenaline_ghost',compact('colour_options','products'));
    }
}
