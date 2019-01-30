<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shoefinder_detail;

class Shoefinder extends Model
{   
    protected $table = 'shoefinder_mast';

    public static function getshoe($tag,$experience_type,$experience,$gender,$trail_status){
        $result = [];
        $shoefinder_result = self::where('tag' ,$tag)
                                 ->where('experience_type' ,$experience_type)
                                 ->where('experience' ,$experience)
                                 ->where('gender' ,$gender)
                                 ->where('trail' ,$trail_status)
                                 ->first();
        if(!$shoefinder_result) return '';
        $gender = ($shoefinder_result->gender=='mens') ? 'men' : 'women';
        $shoe_version_array =array($shoefinder_result->s1,$shoefinder_result->s2,$shoefinder_result->s3,$shoefinder_result->s4);
        
        $shoe_detail = Shoefinder_detail::whereIn('shoe_version',$shoe_version_array)->orderByRaw("FIELD(shoe_version ,'$shoefinder_result->s1', '$shoefinder_result->s2', '$shoefinder_result->s3', '$shoefinder_result->s4') ASC")->get();
        if(!$shoe_detail) return '';
        $items = $shoe_detail->flatten()->pluck($gender);
        $items_data = $items->map(function ($item) {
            $i = explode(' ',$item);
            $style = $i[0];
            $color_code = $i[1];
            return array('style' => $style, 'color_code' => $color_code);
        });
        $orderby_style_string = implode("','",$items_data->pluck('style')->toArray());
     
        $styles = \App\Models\Product::whereIn("style",$items_data->pluck('style'))
                  ->whereHas('variants', function ( $query ) {
                        $query->where('visible', '=', 'Yes');
                  })
                  ->orderByRaw("FIELD(style ,'$orderby_style_string') ASC")
                  ->get();
        if(!$styles){
             return '';
        }
        
        $products = $styles->filter(function ($value, $key) use ($items_data) {
            $data=[];
                  foreach($items_data as $value_array){
                     if($value_array['style']==$value->style && $value_array['color_code']==$value->color_code){
                        $data[] = $value;
                     }
                  }
                return $data;
        })->unique('style');
       
        $colour_options = $styles->unique(function ($item){
            return $item['style'].$item['color_code'];
        });
       
        $result['product_details'] = $products;
        $result['shoe_detail'] = $shoe_detail;
        $result['colour_options'] = $colour_options;
        return $result;
    }
}
