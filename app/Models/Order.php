<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    protected $fillable = ['cart_id', 'user_id', 'total', 'freight_cost','delivery_type', 'grand_total', 'status', 'payment_status', 'transaction_id', 'transaction_status'];

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
    
    public static function createNew($cart, $validatedAddress)
    {  
        //print_R($cart);die;
        $order = self::updateOrCreate(
            [
                'user_id' => $cart['user_id'],
                'cart_id' => $cart['id'], 
            ],
            [
                'total' => $cart['total'],
                'freight_cost' => $cart['freight_cost'],
                'grand_total' => $cart['grand_total'],
                'delivery_type' => $cart['delivery_type'],
            ]
        );
        $order_id = $order['id'];
       
        Order_address::updateOrCreate(
            [ 'order_id' => $order_id ],
            Order_address::prepareAddressForSaving($validatedAddress)
        );
        

        $order->orderItems()->delete();
        $cart->cartItems->each(function($item) use ($order) {
            $order->orderItems()->create([
                     'variant_id' =>  $item->variant->id,
                     'style' =>  $item->variant->product->style,
                     'colour' =>  $item->variant->product->color_name,
                     'image' =>  $item->variant->product->image->image1Small(),
                     'qty' =>  $item->qty,
                     'price' =>  $item->price,
                     'price_sale' =>  $item->price_sale,
             ]);
        });
        
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
}
