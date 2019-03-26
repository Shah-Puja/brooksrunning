<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event_mast;
use App\Models\Event_month;

class EventController extends Controller {

    public function events_view() {
        $upcoming_events = event_mast::where('status', 'Y')->whereRaw('event_timestamp >= CURDATE()')->orderBy('event_timestamp', 'asc')->get();
        return view('info.event-view.events', compact('upcoming_events'));
    }

    public function index($month) {
        $events = event_mast::where('status', 'Y')->where('month', 'like', '%' . $month . '%')->orderBy('event_timestamp', 'asc')->get();
        //echo "<pre>";print_r($events);die;
        $month_name = str_replace("-", " ", $month);
        $months = event_month::where('month_name', 'like', '' . $month_name . '')->first();
        $month_id = $months->month_id;
        $monthObj = new event_month();
        $prev_month = $monthObj->getMonthNameByID($month_id - 1);
        $next_month = $monthObj->getMonthNameByID($month_id + 1);
        return view('info.event-view.month-event', compact('events', 'month_name', 'months', 'prev_month', 'next_month'));
    }

    public function events_detail($event){
        $event = event_mast::where('slug', 'like', '%' . $event . '%')->first();
        return view('info.event-view.month-detail', compact('event'));
    }

    public function events_default()
	{
		return view( 'info.event-view.month');
    }

    public function new_events_listing()
	{
		return view( 'info.New-event-view.events-listing');
    }

}
