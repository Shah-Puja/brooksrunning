<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoefinderController extends Controller
{
    //
    public function shoefinder()
	{
        //echo "a";
		return view( 'customer.shoefinder.shoefinder');
    }
}
