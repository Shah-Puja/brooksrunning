<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class meet_brooksController extends Controller
{
   public function competition()
	{
		return view( 'meet_brooks.competition');
    }
    public function injury_prevention()
    {
        return view( 'meet_brooks.injury-prevention');
    }
    public function newsletter()
    {
        return view( 'meet_brooks.newsletter');
    }
    public function run_happy_view()
    {
        return view( 'meet_brooks.run_happy_is');
    }
    public function run_signature()
    {
        return view( 'meet_brooks.run-signature');
    }
    public function technology()
    {
        return view( 'meet_brooks.technology');
    }
    public function training_tips()
    {
        return view( 'meet_brooks.training-tips');
    }
    public function what_makes_us_tick()
    {
        return view( 'meet_brooks.what_makes_us_tick');
    }
    public function hello()
    {
        return view( 'meet_brooks.hello');
    }
}

