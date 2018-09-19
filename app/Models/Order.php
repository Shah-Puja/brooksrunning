<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    protected $fillable = ['cart_id', 'user_id', 'total', 'freight_cost', 'grand_total', 'status', 'payment_status', 'transaction_id', 'transaction_status'];

    public static function createNew($cart, $validatedAddress)
    {   
        $order_id = '1';
       
        Order_address::updateOrCreate(
            [ 'order_id' => $order_id ],
            Order_address::prepareAddressForSaving($validatedAddress)
        );
    }
}
