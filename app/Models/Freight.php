<?php

namespace App\Models;

class Freight
{
	public function calculate($cartOrOrder)
	{
		return config('site.freight_cost');	
	}
}