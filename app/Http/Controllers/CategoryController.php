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
        
        //echo "<pre>";
        //print_r($styles);
        //echo "</pre>";

        return view( 'customer.categorylower', compact('products', 'styles') );
    }
}
