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
        /*echo "eeeeeeeeeeeeeeeeeeeee";echo "<pre>";print_r($event);die;
        dd($event);*/
        $subscriber = array(
            'email' => $event->user->email,
            'name' => $event->user->first_name." ".$event->user->last_name,
            'ad_tracking' => $event->user->source,            
            'custom_fields' => array(
                'Post Code' => $event->user->postcode,
                'Gender' => $event->user->gender,
                'Birth Day'=> $event->user->birth_date,
                'Birth Month' => $event->user->birth_month,
                'Age' => $event->user->age_group,
                'State' => $event->user->state
                ),                        
            );          
        $this->subscriptionService->updateoradd_Subscriber($subscriber);

        //$this->subscriptionService->addiContact($event->user->email);
    }
}

