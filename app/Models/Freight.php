<?php

namespace App\Models;

class Freight
{
	public function calculate($cartTotal)
	{
		if(isset($cartTotal) && $cartTotal > 50){
			$freight_cost = '0.00';	
		}else{
			$freight_cost = config('site.freight_cost');
		}
		//return config('site.freight_cost');	
		return $freight_cost;
	}
}