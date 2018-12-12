<?php

namespace App\SYG\Subscribers;

interface SubscriberInterface
{
	public function add($subscriber);
	public function findSubscriber($subscriber);
	public function update($found_subscribers, $data);
}