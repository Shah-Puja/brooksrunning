<?php

namespace App\Listeners;

use App\Events\ApialertReceived;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAlert;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApialertProcessor implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ApialertReceived  $event
     * @return void
     */
    public function handle(ApialertReceived $event)
    {
        //echo "<pre>";print_r($event);die;
        Mail::to('trunaltamore@gmail.com')
                ->send( new OrderAlert($event->order) );
        /*Mail::to( config('site.notify_email') )
                ->cc( config('site.syg_notify_email') )
                ->send( new OrderSubmittedNotification($event->order) );*/
    }
}
