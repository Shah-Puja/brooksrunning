<?php

namespace App\Http\Controllers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;
use App\Models\User;

class testicontact extends Controller {

    protected $client;

    public function __construct(SubscriberInterface $client) {
        $this->client = $client;
    }

    /** For testing  */
    public function add() {
        $arr['email'] = 'puja_shah2a@yahoo.com';
        $arr['name'] = 'Puja Shah';
        $response = $this->client->updateoradd_Subscriber($arr, null, null, null, null, null, null, null, null, null, null, null, null, null);
    }

    //unsubscribed users from icontact to web
    public function unsubscribe_list() {
        $unsubscribers = $this->client->fetch_unsubscription_info();
        foreach ($unsubscribers as $unsubscribed_user) {
            // echo "<pre>";print_r($unsubscribed_user);die;
            //update register table users to unsubscribed status
            if ($unsubscribed_user->status == "unsubscribed") {
                $contact_id = $unsubscribed_user->contactId;
                User::where('icontact_id', $contact_id)->update(['icontact_subscribed' => 'No']);
            }
            echo "success";
            die;
        }
    }

    //web to icontact
    public function push_to_icontact() {
        $users = User::where('icontact_subscribed', NULL)->orWhere('icontact_subscribed', '')->orderBy('id', 'desc')->limit(20)->get();
        //echo "<pre>";print_r($users);die;
        foreach ($users as $user) {
            $email = $user->email;
            if(filter_var($email, FILTER_VALIDATE_EMAIL) !== false){
                echo $email."valiiiiiiiiiiiiiiiiiiiid";
            }else{
            echo $email."not valid";
            }die;
            $user->first_name = ($user->first_name) ? $user->first_name : "";
            $user->last_name = ($user->last_name) ? $user->last_name : "";
            $name = $user->first_name . " " . $user->last_name;
            echo $email."<br>";die;
            $arr = array('name' => $name, 'email' => trim($email));
            $response = $this->client->updateoradd_Subscriber($arr, null, null, null, null, null, null, null, null, null, null, null, null, null);
        }
    }

}
