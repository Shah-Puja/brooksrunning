<?php

namespace App\SYG\Subscribers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;

class iContactSubscriber implements SubscriberInterface {

    protected $client;

    public function __construct(iContactProApi $client) {
        $this->client = $client;
    }

    public function updateoradd_Subscriber($subscriber) {
        $email = $subscriber['email'];
        $name = explode(" ", $subscriber['name']);
        $fname = (isset($subscriber['name']) && !empty($subscriber['name'])) ? $name[0] : "";
        $lname = (isset($subscriber['name']) && !empty($subscriber['name'])) ? $name[1] : "";

        $response = $this->client->addContact($email, null, null, $fname, $lname, null, '', '', '', '', '', '', '', null, 'subscribers');
        //$contact = $oiCP->addContact($email, null, null, $fname, $lname, null, '', '', '', '', '', '', '', null, 'subscribers');
        /*echo "<pre>";
        print_r($response);
        print_r($response->contactId);*/ 

        $subscriberesponse = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
        //echo "<br>" . "In iContactSubscriber";
    }

    public function update($found_subscribers, $data) {
        
    }

    public function fetch_unsubscription_info(){
        $response = $this->client->fetch_unsubscription_info();
        return $response;
    }

}
