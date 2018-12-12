<?php

namespace App\SYG\Subscribers;

use AWeberAPI;
use App\SYG\Subscribers\SubscriberInterface;

class AweberSubscriber implements SubscriberInterface {

    protected $client;
    public function __construct(AWeberAPI $client) {
        $this->client = $client;
    }

    public function add($subscriber) {
        
        $subscriber = array(
            'ad_tracking' => 'syg_api_example',
            'custom_fields' => array(
                'State' => 'vic'
            ),
            'email' => $subscriber->email,
            'name' => $subscriber->name,
            
        );
        $account = $this->client->getAccount(config('services.aweber.accesskey'), config('services.aweber.accesssecret'));
        $listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
        $list = $account->loadFromUrl($listUrl);
        $this->findSubscriber($subscriber);
    }

    public function findSubscriber($subscriber) {
        $account = $this->client->getAccount(config('services.aweber.accesskey'), config('services.aweber.accesssecret'));
        $listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
        $list = $account->loadFromUrl($listUrl);
        $email = array('email'=> $subscriber['email']);
        $response = $list->subscribers->find($email);
        if($response->total_size > 0){
            $this->update($response,$subscriber);
        }else{
            $list->subscribers->create($subscriber);
        }
    }


    public function update($found_subscribers, $data){
        foreach ($found_subscribers as $subscriber) {
            $s_data = $subscriber->data;
            $s_custom_fields = $s_data['custom_fields'];
            $arr_dif = array_diff_key($s_custom_fields, $data['custom_fields']);
            
            if(!empty($arr_dif)){
                $data['custom'] = array_merge($data['custom_fields'],$arr_dif);
            }
            
            if($data['ad_tracking'] == 'Competition'){
                $subscriber->name = $data['name'];
                $subscriber->status = 'subscribed';
                $subscriber->custom_fields = $data['custom_fields'];
                $subscriber->save();
                //$msg = 'subscriber';
            } else {
                if ($subscriber->data['status'] == 'subscribed'):
                    $subscriber->name = $data['name'];
                    $subscriber->custom_fields = $data['custom_fields'];
                    $subscriber->save();
                    //$msg = 'subscriber';
                else:
                    //$msg = 'subscriber';
                endif;
            }
        }

    }
}
