<?php

namespace App\SYG\Subscribers;

interface SubscriberInterface
{
	public function addiContact($subscriber);
	public function updateoradd_Subscriber($subscriber);
	public function update($found_subscribers, $data);
}