<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\OrderReceived;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderAdmin;
use App\Mail\OrderUser;


class ManualOrderMail extends Controller
{
    public function index($from,$to){
        echo "Hi $from $to";
        $orders=Order::whereBetween("order_no",[$from,$to])->with('orderItems.variant.product', 'address')->get();
        foreach($orders as $order){
            event(new OrderReceived($order));
        }   
        //print_r($order);
        //$order = $this->order->load('orderItems.variant.product', 'address');
        //event(new OrderReceived($order));
    }
}
