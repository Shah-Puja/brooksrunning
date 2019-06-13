<?php

namespace App\SYG\Subscribers;

use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\iContactSubscriberInterface;
use App\Models\User;
use DB;

class iContactSubscriber implements iContactSubscriberInterface {

    protected $client;

    public function __construct(iContactProApi $client) {
        $this->client = $client;
    }
    public function getContacts($limit,$offset){
        $response = $this->client->getContactsAll($limit,$offset);
        return $response;
    }

    public function updateoradd_Subscriber($subscriber) {
        $email = $subscriber['email'];
        $name = explode(" ", $subscriber['name']);
        $fname = (isset($subscriber['name']) && !empty($subscriber['name'])) ? $name[0] : "";
        $lname = (isset($subscriber['name']) && !empty($subscriber['name'])) ? $name[1] : "";

        //echo "<pre>";print_R($subscriber);die;

        $response = $this->client->addContact($email, null, null, $fname, $lname, null, '', '', '', '', '', '', '', null, 'subscribers');
        if (empty($response)) {
            User::where('email', $email)->first()->update(['icontact_subscribed' => 'Rejected', 'icontact_id' => 0]);
        } else {
            $subscriberesponse = $this->client->subscribeContactToList($response->contactId, 2, 'normal');
            //update in user table
            User::where('email', $email)->first()->update(['icontact_subscribed' => 'Yes', 'icontact_id' => $response->contactId]);
        }
    }

    public function update($found_subscribers, $data) {
        
    }

    public function add_icontactSubscriber($subscriber,$userid) {
        $email = $subscriber['email'];
        $name = explode(" ", $subscriber['name']);
        $fname = (isset($subscriber['name']) && !empty($subscriber['name'])) ? $name[0] : "";
        $lname = (isset($subscriber['name']) && !empty($subscriber['name'])) ? $name[1] : "";
        $street = (isset($subscriber['street']) && $subscriber['street'] != '') ? $subscriber['street'] : "";
        $street2 = (isset($subscriber['street2']) && $subscriber['street2'] != '') ? $subscriber['street2'] : "";
        $city = (isset($subscriber['city']) && $subscriber['city'] != '') ? $subscriber['city'] : "";
        $state = (isset($subscriber['state']) && $subscriber['state'] != '') ? $subscriber['state'] : "";
        $post_code = (isset($subscriber['post_code']) && $subscriber['post_code'] != '') ? $subscriber['post_code'] : "";
        $phone = (isset($subscriber['phone']) && $subscriber['phone'] != '') ? $subscriber['phone'] : "";
        $gender = (isset($subscriber['gender'])) ? $subscriber['gender'] : '';
        $birth_date = isset($subscriber['birth_day']) && $subscriber['birth_day'] != '' ? $subscriber['birth_day'] : "";
        $birth_month = isset($subscriber['birth_month']) && $subscriber['birth_month'] != '' ? $subscriber['birth_month'] : "";
        $age = (isset($subscriber['age'])) ? $subscriber['age'] : '';
        $shoe_wear = (isset($subscriber['shoe_wear'])) ? $subscriber['shoe_wear'] : "";
        $ad_tracking = isset($subscriber['ad_tracking']) ? $subscriber['ad_tracking'] : 'User';
        $country = isset($subscriber['country']) ? $subscriber['country'] : '';
        $contest_code = isset($subscriber['contest_code']) ? $subscriber['contest_code'] : '';
        $happy_runner_comp = isset($subscriber['happy_runner_comp']) ? $subscriber['happy_runner_comp'] : '';
        //echo "<pre>";print_R($subscriber);die;
        try{
            $response = $this->client->addContact($email, 'subscribers', null, $fname, $lname, '', $street, $street2, $city, $state, $post_code, $phone, '', '', $gender, $birth_date, $birth_month, $age, $ad_tracking, $shoe_wear, $country, $contest_code, $happy_runner_comp);
            if (empty($response)) {
                User::where('id', $userid)->update(['icontact_subscribed' => 'Rejected', 'icontact_id' => 0]);
            } else {
                $subscriberesponse = $this->client->subscribeContactToList($response->contactId, 2, 'normal');
                //update in user table
                User::where('id', $userid)->update(['icontact_subscribed' => 'Yes', 'icontact_id' => $response->contactId]);
            }
        }catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    public function fetch_unsubscription_info() {
        $response = $this->client->fetch_unsubscription_info();
        $unsubscribed_users = $response->subscriptions;
        //echo "<pre>";print_r($unsubscribed_users);die;
        return $unsubscribed_users;
    }

    public function fetch_icontact_id($email) {
        $icontact_id = 0;
        $response = $this->client->fetch_icontact_id($email);
        if (!empty($response->contacts)) {
            $icontact_id = $response->contacts[0]->contactId;
        }
        return $icontact_id;
    }

}
