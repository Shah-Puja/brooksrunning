<?php

namespace App\Listeners;

use App\Events\SubscriptionReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SYG\Subscribers\SubscriberInterface;

class SendSubscriptionReceivedNotification implements ShouldQueue
{
    protected $subscriptionService;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SubscriberInterface $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionReceived  $event
     * @return void
     */
    public function handle(SubscriptionReceived $event)
    {        
        dd($event);        
        $subscriber = $event->user;
        $subscriber->name = $event->user->first_name . " " . $event->user->last_name;
        $this->subscriptionService->add($subscriber);
    }
}
