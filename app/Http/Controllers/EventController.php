<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function events_view()
	{
		return view( 'info.event-view.events');
    }
    public function index($events_pg){
        return view('info.event-view.'.$events_pg);
    }
}
