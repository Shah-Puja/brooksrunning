<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Event;
use DB;

class eventdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update past event date ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {  
        DB::statement("SET sql_mode = '' ");
        $year=date('Y');
        $events=event::where('event_dt','!=',00)
                       ->where('event_dt','<',date('Y-m-d'))
                       ->whereYear('event_dt','=',$year)->get(['id','event_dt']);
        //dd($events);
        
        foreach ($events as $value) {
            
            $format=date('F Y',strtotime('+1 year'.$value->event_dt));

            event::where('id',$value->id)->update(['date_str'=>$format,'event_dt'=>'0000-00-00','month'=>date('m',strtotime($value->event_dt)),'year'=>date('Y',strtotime($value->event_dt))]);
         }



    }
}
