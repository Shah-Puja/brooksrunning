<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderAdmin extends Mailable
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
        if($this->order->order_type == 'medibank-user'){
            return $this->view('emails.orderadmin')->subject('Brooks Running Purchase Order #7BRN-'.$this->order->order_no);
        } else{
            return $this->view('emails.orderadmin')->subject('Brooks Running Purchase Order #BRN-'.$this->order->order_no);
        }
    }
}
