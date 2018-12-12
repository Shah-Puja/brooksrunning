<?php

namespace App\SYG\Subscribers;

use AWeberAPI;
use App\SYG\Subscribers\SubscriberInterface;

class AweberSubscriber implements SubscriberInterface {

    protected $client;
    public function __construct(AWeberAPI $client) {
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
        $account = $this->client->getAccount(config('services.aweber.accesskey'), config('services.aweber.accesssecret'));
        $listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
        $list = $account->loadFromUrl($listUrl);
        $list->subscribers->create($subscriber);
    }

    public function comp_add($subscriber) {
        $account = $this->client->getAccount(config('services.aweber.accesskey'), config('services.aweber.accesssecret'));
        $listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
        $list = $account->loadFromUrl($listUrl);
        $email = array('email'=> $subscriber['email']);
        $response = $list->subscribers->find($email);
        print_r($response->getStatusCode());
        exit;
        $list->subscribers->create($subscriber);
    }

}
