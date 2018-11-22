<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Variant;

class HomePageController extends Controller
{

    public function index(){

        //Featured product(homepage slider)
        $shoe_info = array('120278_494','110289_050','120277_017','110288_038');
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

        return view ('customer.index',compact('product'));
    }

}
