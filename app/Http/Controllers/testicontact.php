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
        $response = $this->client->addiContact('puja_shah101@yahoo.com', null, null, null, null, null, null, null, null, null, null, null, null, null);
        echo "<pre>";print_R($response[0]->contactId);
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        echo "In TestiContact Controller";die;
        // dump($response);
    }

}
