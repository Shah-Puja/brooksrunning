<?php

namespace App\Listeners;

use App\Events\SubscriptionReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSubscriptionReceivedNotification
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
     * @param  SubscriptionReceived  $event
     * @return void
     */
    public function handle(SubscriptionReceived $event)
    {
        //
        //dd($event);
    }
}
