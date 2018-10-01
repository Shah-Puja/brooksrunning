<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{   
    protected $fillable = ['order_id', 'variant_id', 'product_name', 'style', 'colour', 'image', 'sku', 'qty', 'price', 'rrp'];
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function variant()
    {
        return $this->belongsTo('App\Models\Variant');
    }

}
