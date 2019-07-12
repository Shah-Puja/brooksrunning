<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/categories', function (Request $request) {
	return \App\Models\Category::where('depth','3')->get(['id', 'slug']);
});

Route::get('/products/{slug}', function (Request $request,$id_category) {
    $cat_info = explode("_",$id_category);
    $cat_id = $cat_info[0]; 
    $category = $cat_info[1]; 
    $sorted_products =\App\Models\Category::getProducts($category,$cat_id);
    $products = $sorted_products->unique('style');
    foreach($products as $p){
        foreach($sorted_products as $prod):
		   if($prod->style== $p->style):
		   		$colors_option[$p->style][] = $prod; 
		   endif;
        endforeach;
        
        $max_price = collect($colors_option[$p->style])->transform(function ($product) {
            return $product->variants->pluck('price');
        })->flatten()->max();

        $max_price_sale = collect($colors_option[$p->style])->transform(function ($product) {
                    return $product->variants->pluck('price_sale');
                })->flatten()->max();

        $min_price = collect($colors_option[$p->style])->transform(function ($product) {
                    return $product->variants->pluck('price');
                })->flatten()->min();
                
        $min_price_sale = collect($colors_option[$p->style])->transform(function ($product) {
                    return $product->variants->pluck('price_sale');
                })->flatten()->min();

        if($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price==$min_price_sale && $max_price==$max_price_sale):
            $price = "&dollar;".$min_price_sale;
        elseif($min_price==$max_price && $min_price_sale==$max_price_sale && $min_price!=$min_price_sale && $max_price!=$max_price_sale):
            $price = "<del> &dollar;".$max_price."</del> &dollar;".$min_price_sale;
        elseif($min_price==$min_price_sale && $max_price==$max_price_sale):
            $price = "&dollar;".$min_price_sale." - &dollar;".$max_price_sale;
        elseif($min_price==$max_price && $min_price_sale!=$max_price_sale):
            $price = "<del>&dollar;".$max_price."</del>&dollar;".$min_price_sale." - &dollar;".$max_price_sale;
        elseif($min_price!=$max_price && $min_price_sale==$max_price_sale):
            $price = "<del>&dollar;".$min_price." - &dollar;".$max_price."</del>&dollar;".$min_price_sale;
        else:
            $price =  "<del>&dollar;".$min_price." - &dollar;".$max_price."</del>&dollar;".$min_price_sale." - &dollar;".$max_price_sale;
        endif;
        $data[] = [ 'id' => $p->id, 'group_id' => $cat_id ,'style' => $p->style ,'name' => $p->stylename, 'image' => $p->image->image1Thumbnail(), 'price' => $price ];
    }
	return response()->json($data);
});

Route::post('/products', function (Request $request) {
    $ranking = collect(request('ranking'));
    $group_id = $ranking->pluck('group_id')->unique();
    foreach ($ranking->pluck('style') as $key => $value) {
        \App\Models\Group_ranks::where('group_id',$group_id)
                                ->where('style',$value)
                                ->update(['display_rank'=>$key+1]);
    }
});