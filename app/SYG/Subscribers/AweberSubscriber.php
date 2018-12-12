<?php

namespace App\SYG\Subscribers;

use AWeberAPI;
use App\SYG\Subscribers\SubscriberInterface;

class AweberSubscriber implements SubscriberInterface {

    protected $client;

    public function __construct(AWeberAPI $client) {
        $this->middleware(function ($request, $next) {
            $account = $this->client->getAccount(config('services.aweber.accesskey'), config('services.aweber.accesssecret'));
            $listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
            $this->list = $account->loadFromUrl($listUrl);
            return $next($request);
        });
        $this->client = $client;
    }

    public function add($subscriber) {
        
        $subscriber = array(
            'ad_tracking' => 'syg_api_example',
            'custom_fields' => array(
                'State' => 'vic'
            ),
            'email' => $subscriber->email,
            'name' => $subscriber->name,
            
        );
        $this->list->subscribers->create($subscriber);
    }

    public function comp_add($subscriber) {
        $email = array('email' => $subscriber->email);
        $response = $this->list->subscribers->find($email);
        dd($response);
        $this->list->subscribers->create($subscriber);
    }

}
