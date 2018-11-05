<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUsEnquiry;
use Illuminate\Support\Facades\Mail;
use App\Mail\EnquirySubmittedNotification;

class ContactUsEnquiryController extends Controller
{
	public function create()
	{
		return view( 'info.contact-us');	
	}

	public function store(ContactUsEnquiry $enquiry)
	{  
    	request()->validate([
            'fname' => 'required',
            'lname' => 'required',
    		'phone' => 'required',    		
    		'email' => 'required|email',
     		'subject' => 'required',
            'category' => 'required',
    	]);
    	$enquiry = $enquiry->create([
            'fname' => request('fname'),
            'lname' => request('lname'),
    		'phone' => request('phone'),
    		'email' => request('email'),
    		'subject' => request('subject'),
            'order_no' => request('order_no'),
            'category' => request('category'),
    	]);

        Mail::to( config('site.notify_email') )
                ->cc( config('site.syg_notify_email') )
                ->queue( new EnquirySubmittedNotification($enquiry) );

    	return response()->json([ 'success' => 'Thank you for your enquiry, someone will be in touch soon.' ]);

	}
}
