<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;

class testicontact extends Controller {

    public function __construct(iContactProApi $client) { 
        $this->client = $client;
    }

    public function add($subscriber) {
        $subscriber->email = 'puja_shah10@yahoo.co.in';
        $response = $this->client->addContact($subscriber->email, null, null, null, null, null, null, null, null, null, null, null, null, null);
        dump($response->contactId);
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        // dump($response);
    }

}
