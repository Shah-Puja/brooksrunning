<?php

namespace App\Listeners;

use App\Events\SubscriptionReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\SYG\Subscribers\SubscriberInterface;
use App\Models\Order_address;

class SendSubscriptionReceivedNotification implements ShouldQueue {

    protected $subscriptionService;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(SubscriberInterface $subscriptionService) {
        $this->subscriptionService = $subscriptionService;
    }

    /**
     * Handle the event.
     *
     * @param  SubscriptionReceived  $event
     * @return void
     */
    public function handle(SubscriptionReceived $event) {
         //echo "eeeeeeeeeeeeeeeeeeeee";echo "<pre>";print_r($event);die;
          

        $subscriber = array(
            'email' => $event->user->email,
            'name' => $event->user->first_name . " " . $event->user->last_name,
            'ad_tracking' => $event->user->source,
            'custom_fields' => array(
                'Post Code' => $event->user->postcode,
                'Gender' => $event->user->gender,
                'Birth Day' => $event->user->birth_date,
                'Birth Month' => $event->user->birth_month,
                'Age' => $event->user->age_group,
                'Country' => $event->user->state,
                'Shoes you wear' => $event->user->shoe_wear,
                'HappyRunner Comp' => $event->user->contest_code,
            ),
        );

        if ($event->user->source == 'Order') {
            $user_detail = Order_address::where('email', '=', $event->user->email)->first();
            if (isset($user_detail) && $user_detail->signme == 1) {
                $this->subscriptionService->updateoradd_Subscriber($subscriber);
            }
        } else if ($event->user->source != 'Order') {
            $this->subscriptionService->updateoradd_Subscriber($subscriber);
        }
    }

}
