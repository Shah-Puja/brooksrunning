<?php

namespace App\SYG\Subscribers;

interface SubscriberInterface
{
	public function add($subscriber);
	public function comp_add($subscriber);
}