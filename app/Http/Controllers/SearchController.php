<?php

namespace App\Http\Controllers;

class SearchController extends Controller
{
	public function index()
	{
		$product = \App\Models\Product::search( request('q') )
										->get()
										//->take(10)
										->map(function($item) {
											return $item->load('variants');
										});
	
		$products =	$product->filter(function ($value, $key) {
			           if($value->variants){
						   return $value->variants->firstWhere('visible','Yes') ;
						}
					});			
		$styles = $products->where('seo_name','!=','')->unique('style')->slice(0,10);
		return view('customer.searchproduct', compact('products','styles') );
	}
}
