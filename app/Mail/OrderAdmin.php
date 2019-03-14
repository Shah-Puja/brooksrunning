<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class OrderAdmin extends Mailable {

    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order) {
        $this->order = $order;
        echo "eeeeeeeeeeeee".Session::get('medibank_gateway');die;
        if (Session::get('medibank_gateway') == 'Yes') {
            $subject = 'Brooks Running Purchase Order #7BRN';
        } else {
            $subject = 'Brooks Running Purchase Order #BRN';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.orderadmin')->subject($subject . '-' . $this->order->order_no);
    }

}
