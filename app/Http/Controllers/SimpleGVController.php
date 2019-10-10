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
                    $gif_array[] = [ 'gv' => $order->giftcert_ap21code,'pin' => $order->giftcert_ap21pin ];
                }
            }
            print_r($gif_array);
            if($gif_array!=''){
                SimpleGv::where(function ($query) use ($gif_array) {
                    $query->where('gv', $gif_array->gv)
                          ->where('pin', $gif_array->pin);
                })->update(['used'=>'Yes']);
            }
        }
   } 
}
