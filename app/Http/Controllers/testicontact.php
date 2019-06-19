<?php

namespace App\Http\Controllers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\iContactSubscriberInterface;
use App\Models\User;
use DB;
use App\Models\Icontact_pushmail;

class testicontact extends Controller {

    protected $client;

    public function __construct(iContactSubscriberInterface $client) {
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
        $icontact_id_arr = array();
        $unsubscribers = $this->client->fetch_unsubscription_info();
        foreach ($unsubscribers as $unsubscribed_user) {
            //update user table users to unsubscribed status
            if ($unsubscribed_user->status == "unsubscribed") {
                $contact_id = $unsubscribed_user->contactId;
                $icontact_id_arr[] = $contact_id;
            }
        }
        User::whereIn('icontact_id', $icontact_id_arr)->update(['icontact_subscribed' => 'No']);
        echo "success";
        die;
    }

    public function pull_from_icontact($runcnt) {
        $icontact_id_arr = array();
        $limit=5000;
        $offset=($runcnt-1)*$limit;        
        $subscribers = $this->client->getContacts($limit,$offset);
        $contact_arr=array();
        foreach($subscribers->contacts as $subscriber){
            echo "<br>".$subscriber->email." - ".$subscriber->contactId." - ".$subscriber->status;
            $contact_arr[]=array('email'=>$subscriber->email,'contactid'=>$subscriber->contactId,'status'=>$subscriber->status);
        }
        DB::table('users_icontact')->insert($contact_arr);
        //echo "<pre>".print_r($contact_arr)."</pre>";

        /*foreach ($unsubscribers as $unsubscribed_user) {
            //update user table users to unsubscribed status
            if ($unsubscribed_user->status == "unsubscribed") {
                $contact_id = $unsubscribed_user->contactId;
                $icontact_id_arr[] = $contact_id;
            }
        }
        User::whereIn('icontact_id', $icontact_id_arr)->update(['icontact_subscribed' => 'No']);
        echo "success";
        die;*/
    }

    public function fetch_icontact_ids_in_web() {
        $user_arr = array();
        $users = User::where('icontact_subscribed', NULL)->orWhere('icontact_subscribed', '')->orderBy('id', 'desc')->limit(10)->get();
        foreach ($users as $key => $user_info) {
            $icontact_id = $this->client->fetch_icontact_id($user_info->email);
            if ($icontact_id != 0) {
                User::where('email', $user_info->email)->update(['icontact_subscribed' => 'Yes', 'icontact_id' => $icontact_id]);
            } else {
                $user = User::where('email', $user_info->email)->first();
                $person_arr = array('name' => $user->first_name . " " . $user->last_name, 'email' => trim($user->email), 'gender' => $user->gender, 'birth_day' => $user->birth_date,
                    'birth_month' => $user->birth_month, 'age' => $user->age_group, 'post_code' => $user->postcode, 'country' => $user->state,
                    'shoe_wear' => $user->shoe_wear, 'happy_runner_comp' => $user->contest_code, 'ad_tracking' => $user->source);
                $this->client->add_icontactSubscriber($person_arr);
            }
        }
        //$all_subscribers = $this->client->getContactsAll();
        //echo "<pre>";print_r($all_subscribers);die;
    }

    //web to icontact
    public function push_to_icontact() {
        $users = User::where('icontact_id', NULL)->orWhere('icontact_id', '0')->orderBy('id', 'desc')->limit(10)->get();
        foreach ($users as $user) {
            $email = $user->email;
            $userid = $user->id;
            echo "<br>" . $email;

            $person_arr = array('name' => $user->first_name . " " . $user->last_name, 'email' => trim($user->email), 'gender' => $user->gender, 'birth_day' => $user->birth_date,
                'birth_month' => $user->birth_month, 'age' => $user->age_group, 'post_code' => $user->postcode, 'country' => $user->state,
                'shoe_wear' => $user->shoe_wear, 'happy_runner_comp' => $user->contest_code, 'ad_tracking' => $user->source, 'contest_code' =>$user->aweber_ad_tracking);
            $this->client->add_icontactSubscriber($person_arr,$userid);
        }
        echo "<br>" . "1000 Users inserted in iContact";
    }

    public function push_queued_records_to_icontact() {
        $pushmail_users = Icontact_pushmail::where('status', 'queue')->orderBy('pushmail_id', 'asc')->limit(100)->get();
        //echo "<pre>";print_r($pushmail_users);die;
        foreach ($pushmail_users as $user) {
            $email = $user->email;
           // $userid = $user->id;
            echo "<br>" . $email; 

            $person_arr = array('fname' => $user->fname, 'lname' => $user->lname, 'email' => trim($user->email),
                'contest_code' => $user->comp_name, 'ad_tracking' => $user->source, 'gender' => $user->gender,
                'city' => $user->city, 'state' => $user->state,
                'birth_day' => $user->birth_day, 'birth_month' => $user->birth_month,
                'age' => $user->age_group, 'post_code' => $user->postcode,
                'phone' => $user->phone, 'shoe_wear' => $user->shoe_wear,
                'country' => $user->country, 'happy_runner_comp' => $user->happy_runner_comp,
                'training_for' => $user->training_for, 'likes_to_run' => $user->likes_to_run,
                'experience_preference' => $user->experience_preference,
            );
            $this->client->add_icontactpushmailSubscriber($person_arr);
        }
        echo "<br>" . "success";
    }

}
