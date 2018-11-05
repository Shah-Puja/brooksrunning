<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
		  return view( 'customer.myaccount.account-personal');
<<<<<<< HEAD
    }
    public function order_history()
    {
        return view( 'customer.myaccount.order-history');
=======
>>>>>>> 78e98de72e4e6baa84decb93b53e8b4807354a4f
    }
}
