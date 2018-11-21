<?php

namespace App\Http\Controllers;

class SearchController extends Controller
{
	public function index()
	{
		$product = \App\Models\Product::search( request('q') )->get();
		$products = collect($product->load('variants'))->filter(function ($value, $key) {
			if($value->variants){
				return $value->variants->firstWhere('visible','Yes') ;
			 }
		 });		
		$styles = $products->unique('style')->slice(0,10);
		return view('customer.searchproduct', compact('products','styles') );
	}
}
