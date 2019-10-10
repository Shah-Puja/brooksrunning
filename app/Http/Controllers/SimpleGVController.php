<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpleGv;
use App\Models\Order;

class SimpleGVController extends Controller
{
   public function gv_check(){
        $orders = Order::where('status','Completed')->get();
        $gif_array = [];
        if($orders!=''){
            foreach($orders as $order){
                if($order->giftcert_ap21code!='' && $order->giftcert_ap21pin!=''){
                    $gif_array[] = [ 'gv' => $order->giftcert_ap21code,'pin' => $order->giftcert_ap21pin ];
                }
            }
            echo "<pre>";
            print_r($gif_array);
        }
   } 
}
