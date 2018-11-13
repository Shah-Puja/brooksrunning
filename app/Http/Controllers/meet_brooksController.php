<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
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

        if(!view()->exists('meet_brooks.competition.'.$comp_name.'_form')){
            return abort(404);
         }
        return view('meet_brooks.competition.competition',compact('comp_name'));

    }
    public function roadtester()
	{
		return view( 'meet_brooks.roadtester');
    }
}

