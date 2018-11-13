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

    public function make_member(){
       // print_r($_POST);
        $email = $_POST['user_email'];
        $password = Hash::make($_POST['pass']);
        // print_r($email);
        User::where('email', $email)->update(['password' => $password]);
    }
}
