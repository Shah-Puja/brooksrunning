<?php

namespace App\Listeners;

use App\Events\OrderReceived;
use App\Mail\OrderUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAdmin;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderProcessor implements ShouldQueue
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
     * @param  OrderReceived  $event
     * @return void
     */
    public function handle(OrderReceived $event)
    {
        //echo "<pre>";print_r($event);die;
        Mail::to($event->order->address->email)
                ->bcc( config('site.syg_notify_email') )
                ->send( new OrderUser($event->order) );
        Mail::to( config('site.notify_email') )
                ->bcc( config('site.syg_notify_email') )
                ->send( new OrderAdmin($event->order) );
    }
}
