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
		$account = $this->client->getAccount( config('services.aweber.accesskey'), config('services.aweber.accesssecret') );
		$listUrl = "/accounts/$account->id/lists/" . config('services.aweber.listid');
        $list = $account->loadFromUrl($listUrl);
		$subscriber = array(
		    'email' => $subscriber->email,
		    'name'  => ''
		);
		$list->subscribers->create($subscriber);
 	}
}