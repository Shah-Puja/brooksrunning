<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class meet_brooksController extends Controller
{
    public function index($meet_brooks_pg){
        if(!view()->exists('meet_brooks.'.$meet_brooks_pg)){
           return abort(404);
        }
        return view('meet_brooks.'.$meet_brooks_pg);
    }

    public function competition($comp_name){
<<<<<<< HEAD

=======
        if(!view()->exists('meet_brooks.competition.'.$comp_name)){
            return abort(404);
         }
>>>>>>> fadcc0415790eecc146ac195d49201d656c8a83e
        return view('meet_brooks.competition.'.$comp_name);
    }
    public function roadtester()
	{
		return view( 'meet_brooks.roadtester');
    }
}

