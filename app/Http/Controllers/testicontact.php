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
        $response = $this->client->addiContact($subscriber->email, null, null, null, null, null, null, null, null, null, null, null, null, null);
        echo "<pre>";print_R($response->contactId);
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        echo "In TestiContact Controller";die;
        // dump($response);
    }

}
