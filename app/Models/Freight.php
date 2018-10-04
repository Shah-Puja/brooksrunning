<?php

namespace App\Models;

class Freight
{
	public function calculate($cartOrOrder)
	{
		//echo "eeeeeeee";echo "<pre>";print_r($cartOrOrder);die;
		return config('site.freight_cost');	
	}
}