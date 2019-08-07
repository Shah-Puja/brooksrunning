<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\ContactUsEnquiry;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnquiryUserAfterhoursNotification extends Mailable implements ShouldQueue {

    use Queueable,
        SerializesModels;

    public $enquiry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactUsEnquiry $enquiry) {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from(env('ENQUIRY_NOTIFY_EMAIL'),env('MAIL_FROM_NAME', 'STAGING - Brooks Running'))->view('emails.enquiryuserafterhoursnotification')->subject('Brooks Running Auto reply - Enquiry Email');
    }

}
