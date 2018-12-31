<?php

namespace App\Http\Controllers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;

class testicontact extends Controller {

    protected $client;

    public function __construct(SubscriberInterface $client) {
        //echo "dddddddd";die;
        //$client = \App\SYG\Subscribers\iContactProApi::getInstance();
        $this->client = $client;
    }

    public function add() {
        $subscriber = new testicontact($this->client);
        echo "<pre>";print_R($subscriber);die;
        $response = $this->client->addiContact('puja_shah11@yahoo.co.in', null, null, null, null, null, null, null, null, null, null, null, null, null);
        dump($response->contactId);
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        // dump($response);
    }

}
