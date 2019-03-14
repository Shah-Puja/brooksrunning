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
        echo "eeeeeeeeeeeee".Session::get('medibank_gateway');
        echo "<pre>";print_r($order);die;
        $this->order = $order;
    }

}
