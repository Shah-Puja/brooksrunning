<?php

namespace App\Events;

use App\Models\Order;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ApialertReceived
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
        //echo "<pre>";print_r($order);die;
        $this->order = $order;
    }

}
