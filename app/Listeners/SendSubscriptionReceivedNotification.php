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
            'name' => $event->user->first_name . " " . $event->user->last_name,
            'ad_tracking' => 'Subscriber',
            'custom_fields' => array(
                'State' => 'vic'
            ),            
        );        
        $this->subscriptionService->updateoradd_Subscriber($subscriber);
    }
}

