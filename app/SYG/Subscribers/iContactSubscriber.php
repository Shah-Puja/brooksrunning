<?php

namespace App\SYG\Subscribers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;

class iContactSubscriber implements SubscriberInterface {

    protected $client;

    public function __construct(iContactProApi $client) {
        $this->client = $client;
    }

    public function addiContact($subscriber) {

        $response = $this->client->addContact('puja_shah15@yahoo.co.in', null, null, null, null, null, null, null, null, null, null, null, null, null);
        echo "<pre>";
        print_r($response);
        
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        echo "<pre>";
        print_r($response);die;
    }

}
