<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($category) {

        $products = \App\Models\Category::getProducts($category);

        if ($products->count() < 1) {
            abort(404);
        }

        $styles = $products->unique('style');
        //print_r($products->pluck('prod_type')->first());
        /*foreach($styles as $style): 
            $style_tags=$style->tags;
            /*$subset = $style_tags->map(function ($stags) {
                print_r($style_tags->only(['product_id', 'key', 'value']));
            });
            //[0]->attributes;*/


            
            /*echo "<hr><pre>";
            print_r($style_tags);
            echo "</pre>";
        endforeach;*/
        //exit;
        
        //print_r($tags);
        //print_r($products[0]->variants);
        //echo "</pre>";

        /*$sizes = $width_names = []; 
        foreach($variants as $variant) 
            @php
            $sizes[] = array('size'=> $variant->size,'visible'=> $variant->visible);
            if($variant->width_name!=""){
                $width_names[$variant->width_code]= $variant->width_name; 
            } 
            @endphp
        @endforeach*/


        return view( 'customer.categorylower', compact('products', 'styles') );
    }
}
