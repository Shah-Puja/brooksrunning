<?php

namespace App\Http\Controllers;

class SearchController extends Controller
{
	public function index()
	{
		$products = \App\Models\Product::search( request('q') )
										->get()
										->take(10)
										->map(function($item) {
											return $item;
										});
		$styles = $products->unique('style');
		return view('customer.searchproduct', compact('products','styles') );
	}
}
