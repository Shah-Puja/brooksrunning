<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;

class SubscriberController extends Controller
{
    public function store(Subscriber $subscriber)
    {
    	request()->validate(['email' => 'required|email|unique:subscribers']);
    	$subscriber = $subscriber->create(['email' => request('email')]);
    	return response()->json(['success'=>'Thank you for subscribing!']);
    }
}
