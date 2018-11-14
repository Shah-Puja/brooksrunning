<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SubscriberController extends Controller
{
    public function store(Subscriber $subscriber)
    {
    	request()->validate(['email' => 'required|email|unique:subscribers']);
    	$subscriber = $subscriber->create(['email' => request('email')]);
    	return response()->json(['success'=>'Thank you for subscribing!']);
    }
}
