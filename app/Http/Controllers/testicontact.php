<?php

namespace App\Http\Controllers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;

class testicontact extends Controller {

    protected $client;

    public function __construct(iContactProApi $client) {
        //echo "dddddddd";die;
        //$client = \App\SYG\Subscribers\iContactProApi::getInstance();
        $this->client = $client;
    }

    public function add() {
        $subscriber = new testicontact($this->client);
        $response = $this->client->addContact('puja_shah14@yahoo.co.in', null, null, null, null, null, null, null, null, null, null, null, null, null);
        dump($response->contactId);
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
         dump($response);die;
    }

}
