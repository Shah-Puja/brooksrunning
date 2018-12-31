<?php
namespace App\SYG\Subscribers;
use App\SYG\Subscribers\iContactProApi;
use App\SYG\Subscribers\SubscriberInterface;
class iContactSubscriber implements SubscriberInterface
{
	protected $client;
	public function __construct(iContactProApi $client)
	{
		$this->client = $client;
	}
	public function addiContact($subscriber)
	{
		echo "eeeeeee";
		$response = $this->client->addContact($subscriber->email, null, null, null, null, null, null, null, null, null, null, null, null, null);
		dump($response->contactId);
		$response = $this->client->subscribeContactToList($response->contactId, 1, 'normal');
		// dump($response);
	}
}