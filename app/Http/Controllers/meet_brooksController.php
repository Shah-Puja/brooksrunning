<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class meet_brooksController extends Controller
{
    public function index($meet_brooks_pg){
        return view('meet_brooks.'.$meet_brooks_pg);
    }

    public function competition($comp_name){

        return view('meet_brooks.competition.'.$comp_name);
    }
    public function roadtester()
	{
		return view( 'meet_brooks.roadtester');
    }
}

