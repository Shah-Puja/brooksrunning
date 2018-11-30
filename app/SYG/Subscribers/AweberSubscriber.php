<?php

namespace App\SYG\Subscribers;

use AWeberAPI;
use App\SYG\Subscribers\SubscriberInterface;

class AweberSubscriber implements SubscriberInterface
{
	protected $client;

	public function __construct(AWeberAPI $client)
	{
		$this->client = $client;
	}

	public function add($subscriber)
	{
		echo "eeeeeee";die;
		$account = $this->client->getAccount( config('services.aweber.accesskey'), config('services.aweber.accesssecret') );
                echo "<pre>";print_r($account);
		$listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
                echo "<pre>";print_r($listUrl);
        $list = $account->loadFromUrl($listUrl);
        dd($list);
		$subscriber = array(
		    'email' => $subscriber->email,
		    'name'  => $subscriber->name
		);
		$list->subscribers->create($subscriber);
	 }
	 	 
}