<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use App\Models\Staff_competitions;
use App\Models\Store_competitions;

class StaffcompetitionController extends Controller
{
    public function index(){
        $comp_name = strtolower(request()->segment(1));
        $competition = Staff_competitions::where('slug',$comp_name)->firstOrFail();
        if(!view()->exists('staff_competition.'.$comp_name.'_form')){
            return abort(404);
        }
        return view('staff_competition.staff_competition',compact('comp_name','competition'));
    }

    public function store(Recaptcha $recaptcha)
	{  
    	request()->validate([
            'name' => 'required',
    		'gender' => 'required',    		
            'email' => 'required|email',
            'postcode' => 'required',
            'store_name' => 'required',
            'shoe_size' => 'required',
            'g-recaptcha-response' => ['required', $recaptcha],
            ]);

    	$competition = Store_competitions::firstOrCreate(
            [ 'email' => request('email'),'competition_name' => request('comp_name')],
            [
                'slug' => request('comp_slug'),
                'name' => request('name'),
                'gender' => request('gender'),
                'post_code' => request('postcode'),
                'store_name' => request('store_name'),
                'shoe_size' => request('shoe_size')

            ]
        );

        if($competition->wasRecentlyCreated){
            return response()->json([ 'success' => '<p class="heading">Thanks for entering the competition.</p> <p class="thankyou_heading">Good Luck!</p>' ]);
        }else{
            return response()->json([ 'success' => '<p class="heading">Thanks for your interest!</p> <p class="thankyou_heading">You have already entered the competition.</p>' ]);
        }

	}
}
