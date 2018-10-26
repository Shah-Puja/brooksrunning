<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoefinderController extends Controller
{
    //
    public function shoefinder()
	{

		return view( 'customer.shoe_finder_view.shoefinder');

    }
}
