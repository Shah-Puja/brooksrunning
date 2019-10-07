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
        //$event = event_mast::where('slug', 'like', '%' . $event . '%')->first();
        //return view('info.event-view.month-detail', compact('event'));
        return redirect('/events');

    }

    public function events_default() {
        return view('info.event-view.month');
    } 

    public function new_events_listing(Request $request) {
       // DB::statement("SET sql_mode = '' ");
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
                                    ->whereRaw("start_dt=00")->get();
                                    //dd($other_upcoming_events);  
                                   // $other_upcoming_events=$this->upcoming_helper($other_upcoming_events);       
                                   
                }
            }
           //dd($year);
           
        
             
            $all_events = event::where('status', 'YES')->where(function($q) use ($where) {
                                $q->where('state', 'like', '%' . $where . '%')
                                ->orWhere('country', 'like', '%' . $where . '%');
                            })->when($month, function ($query) use ($month) {
                                return $query->whereRaw("MONTH(start_dt)=$month");
                            })
                            ->when($month, function ($query) use ($year) {
                                return $query->whereRaw("YEAR(start_dt)=$year ");
                            })->whereRaw("start_dt > CURDATE()")->get();
            
               
                 if($request->when=='' && $request->where=='' ){
                    $other_upcoming_events = event::where('status', 'YES')->whereRaw("end_dt=00")->get();
                    $other_upcoming_events=$this->upcoming_helper($other_upcoming_events);
                 }           
                               
                           
        } else {
            $states= event::select('state_abr')->where('state_abr','!=','')->distinct()->orderBy('state_abr', 'ASC')->get();
            if(!in_array('NT',(array)$states)){
                
                $array_nt=array( "state_abr" => "NT");
              
                $states->push( (object)$array_nt);
                $states=$states->sortBy('state_abr');
            }
            //dd($states);
            $all_events = event::where('status', 'YES')->whereRaw("start_dt >= CURDATE()")
                               ->whereRaw("end_dt >= CURDATE()")
                               ->orwhere('end_dt','>=',date('Y-m-d'))->orderBy('start_dt','ASC')->get();

              $all_events = $all_events->where('status', 'YES');                  

            $other_upcoming_event = event::where('status', 'YES')->whereRaw("next_dt >CURDATE()")->whereRaw("end_dt < CURDATE()")->orderBy('start_dt','ASC')->get();
         
          
           $other_upcoming_events=$other_upcoming_event;
          
           
            
        }
    
        
        return view('info.New-event-view.events-listing', compact('all_events', 'other_upcoming_events', 'when', 'where','states'));
    }

          public function event_type($slug) {
        
          
        
        $single_event=event::where('slug',$slug)->first();
        if($single_event==''){
            return abort(404);
        }   
        if($single_event->series==''){
       
       return view('info.New-event-view.single-event-detail',compact('single_event'));   
        
        }else{

        $event_name=event::where('slug',$slug)->first();
       //dd($event_name);
        $city=$event_name->city;
        
        $id=$event_name->id;

        $series_event=event::where('series',$event_name->series)->orderBy('start_dt','ASC')->get();
        //dd($series_event);
        
       
        return view('info.New-event-view.series-event-detail',compact('series_event','event_name','city','id'));
    }
    }

    public function get_event(Request $request)
    {
       $slug=$request->slug;
       

       $event_data=event::where('slug',$slug)->first();

       return response()->json(['slug' => $event_data]);
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
