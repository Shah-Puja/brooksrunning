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
        echo "<pre>";print_r($subscriber);die;
        //Things need to do when integrated with system:
        //1. to fetch user input details and pass email id
        //2. add icontactid in table while registration and during profile update chk icontact id exists or not, if not then add new contact in the list
        //3. When new competition is there, need to add new list and subscribe the users in that new list
        $response = $this->client->addContact('puja_shah16@yahoo.com', null, null, null, null, null, null, null, null, null, null, null, null, null);
        echo "<pre>";
        print_r($response);
        
        $response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        echo "In iContactSubscriber";echo "<pre>";
        print_r($response);
    }

}
