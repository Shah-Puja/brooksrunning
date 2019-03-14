<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class OrderUser extends Mailable {

    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order) {
        $this->order = $order;
        if (Session::get('medibank_gateway') == 'Yes') {
            $subject = 'Brooks Running Order #7BRN';
        } else {
            $subject = 'Brooks Running Order #BRN';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->view('emails.orderuser')->subject($subject . '-' . $this->order->order_no);
    }

}
