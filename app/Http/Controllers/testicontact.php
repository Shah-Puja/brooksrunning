<?php

namespace App\Http\Controllers;


use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\iContactSubscriberInterface;

class testicontact extends Controller {
protected $client;

    public function __construct(iContactSubscriberInterface $client) { 
        //echo "dddddddd";die;
        //$client = \App\SYG\Subscribers\iContactProApi::getInstance();
        $this->client = $client;
    }

    public function add() { 
        //$subscriber = new testicontact;
        //$subscriber->email = 'puja_shah10@yahoo.co.in';
        $response = $this->client->addiContact('puja_shah11@yahoo.co.in', null, null, null, null, null, null, null, null, null, null, null, null, null);
        echo "<pre>";print_r($response);die;
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        // dump($response);
    }

}
