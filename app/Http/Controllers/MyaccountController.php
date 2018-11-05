<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MyaccountController extends Controller
{
    //
    public function account_homepage()
	  {
		  return view( 'customer.myaccount.account-homepage');
    }
    public function account_order_history()
	  {
		  return view( 'customer.myaccount.account-order-history');
    }
    public function account_personal()
  	{
        //User::where('email', $this->order->address->email)->update(['person_idx'=> $PersonID]);
		  return view( 'customer.myaccount.account-personal');
    }
    public function order_history()
    {
        return view( 'customer.myaccount.order-history');
    }

    public function update_profile(Request $request){
        /*echo "<pre>"; 
        print_r($request->all());die;*/
        User::where('id', auth()->id())->update(['first_name' => $request->first_name,'last_name' => $request->last_name, 'gender' => ucfirst($request->gender),
        'dob' => $request->birth_month."-".$request->birth_date,'birth_date' => $request->birth_date,
        'birth_month' => $request->birth_month, 'age_group' => $request->age_group, 'state' => $request->state, 
        'postcode'=>$request->postcode, 'shoe_wear'=>$request->shoe_wear ? $request->shoe_wear : '', 'password'=> Hash::make($request->password),
        'newsletter'=> @$request->newsletter ? 1 : 0
        ]);
        return redirect('account-personal');

    }
}
