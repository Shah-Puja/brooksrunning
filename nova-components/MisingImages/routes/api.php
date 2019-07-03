<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/data', function (Request $request) {
    
    //future

    $p_images_id = DB::connection('future')->table('p_images')->select('product_id')->distinct()->get()->toArray();
    $p_variants_id = DB::connection('future')->table('p_variants')->select('product_id')->where('visible','Yes')->whereNotIn('product_id',collect($p_images_id)->pluck('product_id')->toArray())->get();
    $future_data =  DB::connection('future')->table('p_products')->select('style','color_code','style_idx','id','stylename','prod_type')->whereIn('id',collect($p_variants_id)->pluck('product_id')->toArray())->get();
    
    //production 
    
    $p_images_id = DB::table('p_images')->select('product_id')->distinct()->get()->toArray();
    $p_variants_id = DB::table('p_variants')->select('product_id')->where('visible','Yes')->whereNotIn('product_id',collect($p_images_id)->pluck('product_id')->toArray())->get();
    $production_data =  DB::table('p_products')->select('style','color_code','style_idx','id','stylename','prod_type')->whereIn('id',collect($p_variants_id)->pluck('product_id')->toArray())->get();

    $data = ['future'=> $future_data, 'production' => $production_data];
    return response()->json($data);
});