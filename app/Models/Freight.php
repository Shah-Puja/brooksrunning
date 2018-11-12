<?php

namespace App\Models;

class Freight
{
	public function calculate($cartTotal)
	{
		if(isset($cartTotal) && $cartTotal > config('site.SHIPPING_SET_LIMIT')){
			$freight_cost = '0.00';	
		}else{
			$freight_cost = config('site.SHIPPING_SET_PRICE');
		}
		//return config('site.freight_cost');	
		return $freight_cost;
	}
}