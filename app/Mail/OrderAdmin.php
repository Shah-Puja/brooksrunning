<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Session;

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
        if (Session::get('medibank_gateway') == 'Yes') {
            echo "Yes Session";
        }else{
            echo "NO";
        }
        echo "<pre>";print_r($order);die;
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
            return $this->view('emails.orderadmin')->subject('Brooks Running Purchase Order #7BRN-'.$this->order->order_no);
        }else{
            return $this->view('emails.orderadmin')->subject('Brooks Running Purchase Order #BRN-'.$this->order->order_no);
        }
        
    }
}
