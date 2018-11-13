<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Competition;

class meet_brooksController extends Controller
{
    public function index($meet_brooks_pg){
        if(!view()->exists('meet_brooks.'.$meet_brooks_pg)){
           return abort(404);
        }
        return view('meet_brooks.'.$meet_brooks_pg);
    }

    public function competition($slug){
        $competition = Competition::where('slug',$slug)->first();
        if(!$competition){
            return abort(404);
        }
        if(!view()->exists('meet_brooks.competition.'.$competition->comp_form)){
            return abort(404);
         }
        return view('meet_brooks.competition.competition',compact('comp_name','competition'));

    }
    public function roadtester()
	{
		return view( 'meet_brooks.roadtester');
    }
}

