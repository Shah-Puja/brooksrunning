<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Session;

class OrderReceived
{
    use Dispatchable, SerializesModels;

    public $order;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        if (Session::get('medibank_gateway') == 'Yes') {
            $order->mail_admin_subject = 'Brooks Purchase Running Order #7BRN-'.$order->order_no;
            $order->mail_user_subject = 'Brooks Running Order #7BRN-'.$order->order_no;
        } else {
            $order->mail_admin_subject = 'Brooks Purchase Running Order #BRN-'.$order->order_no;
            $order->mail_user_subject = 'Brooks Running Order #BRN-'.$order->order_no;
        }
        $this->order = $order;
    }

}
