<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($gender, $category, $prod_type) {

        $products = \App\Category::getProducts($gender, $category, $prod_type);

        if ($products->count() < 1) {
            abort(404);
        }

        $styles = $products->unique('style');

        return view( 'welcome', compact('products', 'styles') );
    }
}
