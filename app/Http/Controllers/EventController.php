<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event_mast;
use App\Models\Event_month;
use App\Models\Event;
use DateTime;
use Carbon\Carbon;
use DB;

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

    public function events_detail($event) {
        $event = event_mast::where('slug', 'like', '%' . $event . '%')->first();
        return view('info.event-view.month-detail', compact('event'));
    }

    public function events_default() {
        return view('info.event-view.month');
    } 

    public function new_events_listing(Request $request) {
        
        $month = $year = $when = $where = '';
       
        if ($request->isMethod('post')) {
            //echo "<pre>";print_r(request()->all());die;
            if ($request->when != '') {
                $when = $request->when;
                $splitarr = explode(' ', $request->when);
                $month = $splitarr[0];
                $year = $splitarr[1];
                $other_upcoming_events = array();
            }
            if ($request->where != '') {
                $where = $request->where;
               
                //display other upcoming events
                if ($request->when == '') {
                    $other_upcoming_events = event::where('status', 'YES')->where(function($q) use ($where) {
                                        $q->where('state', 'like', '%' . $where . '%')
                                        ->orWhere('country', 'like', '%' . $where . '%');
                                    })
                                    ->whereRaw("event_dt=00")->get();
                                    //dd($other_upcoming_events);         
              
                }
            }
           //dd($year);
           
        
             
            $all_events = event::where('status', 'YES')->where(function($q) use ($where) {
                                $q->where('state', 'like', '%' . $where . '%')
                                ->orWhere('country', 'like', '%' . $where . '%');
                            })->when($month, function ($query) use ($month) {
                                return $query->whereRaw("MONTH(event_dt)=$month");
                            })
                            ->when($month, function ($query) use ($year) {
                                return $query->whereRaw("YEAR(event_dt)=$year ");
                            })->whereRaw("event_dt > CURDATE()")->get();
            
               
                 if($request->when=='' && $request->where=='' ){
                    $other_upcoming_events = event::where('status', 'YES')->whereRaw("event_dt=00")->get();
                 }           
                               
                           
        } else {
            $all_events = event::where('status', 'YES')->whereRaw("event_dt > CURDATE()")->orderBy('event_dt','ASC')->get();
           
            $other_upcoming_event = event::where('status', 'YES')->whereRaw("event_dt=00")->get();
            
             $other_upcoming_events = collect($other_upcoming_event)->sortBy(function ($product, $key) {
                return $product['year'].$product['month'];
            });
           
            
        }
    
        //dd($other_upcoming_events);
        //echo "<pre>";print_r($other_upcoming_events);die;
        //$past_events = event_mast::where('status', 'Y')->whereRaw('event_timestamp < CURDATE()')->orderBy('event_timestamp', 'asc')->get();
        //echo "<pre>";print_r($past_events);die;
        return view('info.New-event-view.events-listing', compact('all_events', 'other_upcoming_events', 'when', 'where'));
    }

    public function new_single_event($single_event) {
        
          
          
        $single_event=event::where('event_name',$single_event)->first();
        
        
       
       return view('info.New-event-view.single-event-detail',compact('single_event'));   
        
    }

    public function new_series_event($series_event,$city) {

        $event_name=event::where('series',$series_event)->first();
       

        $series_event=event::where('series',$series_event)->orderBy('year','ASC')->get();
        
        
       
        return view('info.New-event-view.series-event-detail',compact('series_event','event_name','city'));
    }

    public function new_series_static_event() {
        return view('info.New-event-view.series-static-event-detail');
    }

    public function new_series_blurb_per_race_event() {
        return view('info.New-event-view.series-event-blurb-per-race-detail');
    }


    public function static() {
        return view('info.New-event-view.static_single');
    }

    public function series_static() {
        return view('info.New-event-view.static_series');
    }


}
