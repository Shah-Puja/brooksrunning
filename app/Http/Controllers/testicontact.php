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
        $arr['email'] = 'puja_shah2@yahoo.com';
        $arr['name'] = 'Puja Shah';
        //here things need to do in following lines when integrated with system:
        //1. to fetch user input details and pass email id
        //2. add icontactid in table while registration and during profile update chk icontact id exists or not, if not then add new contact in the list
        //3. When new competition is there, need to add new list and subscribe the users in that new list
        $response = $this->client->updateoradd_Subscriber($arr, null, null, null, null, null, null, null, null, null, null, null, null, null);
        echo "<br>". "In TestiContact Controller for testing";
        die; 
    }

    public function unsubscribe_list(){
        $subscriber = new testicontact($this->client);
        $response = $this->client->fetch_unsubscription_info();
        echo "<pre>";print_r($response);die;
    }

}
