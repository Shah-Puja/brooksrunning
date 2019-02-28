<?php

namespace App\Http\Controllers;

use App\Rules\Recaptcha;
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

	public function store(ContactUsEnquiry $enquiry, Recaptcha $recaptcha)
	{  
    	request()->validate([
            'fname' => 'required',
            'lname' => 'required',
    		'phone' => 'required',    		
    		'email' => 'required|email',
     		'subject' => 'required',
	    'category' => 'required',
	    'message' => 'required',
            'g-recaptcha-response' => ['required', $recaptcha],
    	]);
    	$enquiry = $enquiry->create([
            'fname' => request('fname'),
            'lname' => request('lname'),
    		'phone' => request('phone'),
    		'email' => request('email'),
    		'subject' => request('subject'),
            'order_no' => request('order_no'),
	    'category' => request('category'),
	    'message' => request('message'),
		]);
		
		$toemails = explode(',',env('ENQUIRY_NOTIFY_EMAIL'));

		//auto reply check and send email (on after hours- Sat Sunday & (after 9-5 on Monday to Friday))
		if (((!(in_array(date('N'), array(6, 7)))) && date('G') >= 17) || in_array(date('N'), array(6, 7)) || ((!(in_array(date('N'), array(6, 7)))) && date('G') < 9)) {
			Mail::to(request('email'))
			->cc( config('site.syg_notify_email') )
			->queue( new EnquiryUserAfterhoursNotification($enquiry) );  
             
        }

		Mail::to($toemails)
                ->cc( config('site.syg_notify_email') )
				->queue( new EnquirySubmittedNotification($enquiry) );
		
				/**send an email to user send in EnquirySubmittedNotification then chk following condition
				 * if(count(Mail::failures()) > 0 ) {
			echo "Mail failed";die;
		} else {
			echo "Mail sent successfully!";die;
		} */
    	return response()->json([ 'success' => 'Thank you for your enquiry, someone will be in touch soon.' ]);

	}
}
