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

        $prod_type = $products->pluck('prod_type')->first();
        $flag_bra = ($category=='womens-sports-bras') ? 'Yes' : 'No';
        $gender = $products->pluck('gender')->first();
        $filters = \App\Models\Category::provideFilters($products,$prod_type,$flag_bra);

        //echo "<hr><pre>";
        //print_r($products);
        //echo "</pre>";
        //exit;

        return view( 'customer.categorylower', compact('products', 'styles','filters','prod_type','gender','flag_bra') );
    }
}
