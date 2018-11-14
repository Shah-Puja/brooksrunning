<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Competition;
use App\Models\Competition_user;

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

    public function store(Recaptcha $recaptcha)
	{  
    	request()->validate([
            'fname' => 'required',
            'lname' => 'required',
    		'gender' => 'required',    		
            'email' => 'required|email',
     		'country' => 'required',
            'postcode' => 'required',
            'g-recaptcha-response' => ['required', $recaptcha],
            ]);

    	$competition = Competition_user::updateOrCreate(
            [ 'email' => request('email'),'comp_name' => request('comp_name')],
            [
                'comp_slug' => request('comp_slug'),
                'fname' => request('fname'),
                'lname' => request('lname'),
                'gender' => request('gender'),
                'dob' => request('custom_Birth_Month').'-'.request('custom_Birth_Date'),
                'age_group' => request('custom_Age'),
                'postcode' => request('postcode'),
                'shoe_wear' => request('custom_Shoes_you_wear'),
                'country' => request('country'),
                'answer'=>request('custom_Answer')
            ]
        );
        
        //$person_id = app('App\Http\Controllers\PaymentController')->get_personid(request('email'));
        //echo $person_id;
        //exit;
        if($competition->wasRecentlyCreated){
            return response()->json([ 'success' => '<p class="heading">Thank you! </p> <p class="thankyou_heading">Thanks for entering. Good Luck! </p>' ]);
        }else{
            return response()->json([ 'success' => '<p class="heading">Thank for your interest! </p> <p class="thankyou_heading">You have already entered the competition.</p>' ]);
        }

	}
    public function roadtester()
	{
		return view( 'meet_brooks.roadtester');
    }
}

