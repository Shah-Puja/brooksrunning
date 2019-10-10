<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpleGv;
use App\Models\Order;

class SimpleGVController extends Controller
{
   public function gv_check(){
        $orders = Order::whereIn('status',['Completed','Order Number'])->get();
        $gif_array = [];
        if($orders!=''){
            foreach($orders as $order){
                if($order->giftcert_ap21code!='' && $order->giftcert_ap21pin!=''){
                    SimpleGv::where('gv' ,$order->giftcert_ap21code)
                            ->where('pin' ,$order->giftcert_ap21pin)
                            ->update(['used'=>'Yes']);
                }
            }
        }
   } 
}
