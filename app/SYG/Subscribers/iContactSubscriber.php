<?php

namespace App\SYG\Subscribers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;
use App\Models\User;

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

        echo "<pre>";print_R($subscriber);die;

        $response = $this->client->addContact($email, null, null, $fname, $lname, null, '', '', '', '', '', '', '', null, 'subscribers');
        if(empty($response)){
            User::where('email',$email)->update(['icontact_subscribed' => 'Rejected', 'icontact_id' => 0]);
        }else{
            $subscriberesponse = $this->client->subscribeContactToList($response->contactId, 2, 'normal');
            //update in user table
            User::where('email',$email)->update(['icontact_subscribed' => 'Yes', 'icontact_id' => $response->contactId]);
        }
        

    }

    public function update($found_subscribers, $data) {
        
    }

    public function fetch_unsubscription_info(){
        $response = $this->client->fetch_unsubscription_info();
        $unsubscribed_users = $response->subscriptions;
        //echo "<pre>";print_r($unsubscribed_users);die;
        return $unsubscribed_users;
    }

}
