<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Image;


use Illuminate\Http\Request;

class ProductColourController extends Controller
{
    public function index($name,$style,$color){
        $product = Product::where('style',$style)
                          ->where('color_code',$color)
                          ->whereHas('variants', function ( $query ) {
                                $query->where('visible', '=', 'Yes');
                            })
                          ->first();
        if(!$product){
            return abort(404);
        }    
        $variants = $product->variants->where('stock', '!=', '0');

        $product->price = $variants->max('price');
		$product->price_sale = $variants->max('price_sale');
        $product->stock = $variants->max('stock');
        
        $colour_options = Product::where('style',$style)
                                ->whereHas('variants', function ( $query ) {
                                    $query->where('visible', '=', 'Yes');
                                })->get();
        $colour_options = Image::addImagePathsForProducts($colour_options); 


        //echo "<pre>";
        //print_r( $colour_options );
        //echo "</pre>";

        //exit;

        return view ('customer.pdp',compact('product','variants','colour_options'));
    }
    public function list($prodtype){
        return view ('customer.list_' . $prodtype);
    }

}
