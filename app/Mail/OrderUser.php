<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

class OrderUser extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if (Session::get('medibank_gateway') == 'Yes') {
            return $this->view('emails.orderuser')->subject('Brooks Running Order #7BRN-'.$this->order->order_no);
        }else{
            return $this->view('emails.orderuser')->subject('Brooks Running Order #7BRN-'.$this->order->order_no);
        }
            
    }
}
