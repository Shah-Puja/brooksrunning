<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Mail\OrderAp21Alert;
use App\Mail\Ap21Alert;
use Illuminate\Support\Facades\Mail;
use App\Models\Order_log;

class Order extends Model
{   
    protected $fillable = ['order_no', 'cart_id', 'user_id', 'total', 'freight_cost','delivery_type', 'grand_total', 'status', 'payment_status', 'afterpay_token', 'transaction_id', 'transaction_status','order_type','policy_no'];

    public function orderItems()
    {
        return $this->hasMany('App\Models\Order_item');
    }

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart', 'cart_id');
    }

    public function address()
    {
        return $this->hasOne('App\Models\Order_address');
    }
    
    public static function createNew($cart, $user_id , $validatedAddress)
    {  

        $order = self::updateOrCreate(
            [
                'user_id' => $user_id,
                'cart_id' => $cart['id'], 
            ],
            [
                'cart_id' => $cart['id'], 
                'total' => $cart['total'],
                'freight_cost' => $cart['freight_cost'],
                'grand_total' => ($cart['gift_discount']!="") ? ($cart['grand_total'] - $cart['gift_discount']) : $cart['grand_total'],
                'delivery_type' => $cart['delivery_type'],
            ]
        );
        $order_id = $order['id'];
       
        Order_address::updateOrCreate(
            [ 'order_id' => $order_id ],
            Order_address::prepareAddressForSaving($validatedAddress)
        );
        

        $order->orderItems()->delete();
        $promo_code = isset($cart->promo_code) ? $cart->promo_code : "";

        self::where('id',$order_id)->update([
                'coupon_code' => ($promo_code) ? $promo_code : "",
                'discount' => isset($cart->discount) ? $cart->discount : "0.00",
                'giftcert_ap21code' => (isset($cart->gift_id) && $cart->gift_id!="") ? $cart->gift_id : "",
                'giftcert_ap21pin' => (isset($cart->pin) && $cart->pin!="") ? $cart->pin : "",
                'gift_amount' => (isset($cart->gift_discount) && $cart->gift_discount!="") ? $cart->gift_discount : "0",
        ]);
          
       
        
        
        $cart->cartItems->each(function($item) use ($order) {
            $item_total = 0;
            if($item->discount_price!= 0.00){
                $item_total = $item->discount_price;
            }else{
                $item_total = ($item->price_sale * $item->qty);
            }
            $order->orderItems()->create([
                     'variant_id' =>  $item->variant->id,
                     'style' =>  $item->variant->product->style,
                     'colour' =>  $item->variant->product->color_name,
                     'image' =>  $item->variant->product->image->image1Small(),
                     'qty' =>  $item->qty,
                     'price' =>  $item->price,
                     'price_sale' =>  $item->price_sale,
                     'discount' => ($item->discount_detail!=0.00) ? $item->discount_detail : "0.00", 
                     'total' => $item_total
             ]);
        });

        $order->orderItems()->update([
            'promo_code' => ($promo_code) ? $promo_code : ""
        ]);
        return $order_id;
    }

    public function getItemsCount() {
        return $this->orderItems->sum('qty');   
    }

    public function updateOrder($transation_result) {
        $this->transaction_id = $transation_result ? $transation_result->id : null;
        $this->payment_status = Carbon::now();
        $this->transaction_status = $transation_result ? 'Succeeded' : 'Braintree Processor Declined';
        $this->status = $transation_result ? 'Order Completed' : 'Payment Failure';
        $this->save();
    }

    public function canBeFinalised()
    {
        return $this->orderItems->every(function($item) {
            return $item->qty <= $item->variant->stock;
        });
    }

    public function updateOrder_xml($xml) {
        $this->ap21_xml = $xml ? $xml : null;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

    public static function orderap21_alert($order_data, $mail_data){

        Order_log::createNew($order_log);
        Mail::to(config('site.notify_email'))
                    ->cc(config('site.syg_notify_email'))
                    ->send(new OrderAp21Alert($order_data, $data));
    }
    
    public static function ap21_error($api,$url,$payload,$object_id,$error){
        /*Ap21_log::createNew([
                    'process' =>$api,                
                    'request' => $payload,
                    'response' => $error,  
                    'object_id'=>$object_id
                ]);

        $data = [
                    'API' => $api,
                    'URL' => $url,
                    'error' => $error,
                    'parameters' => $payload,
                    'object_id' => $object_id,
                ];
        
        Mail::to(config('site.notify_email'))
              ->cc(config('site.syg_notify_email'))
              ->send(new Ap21Alert($data));*/
    }
}
