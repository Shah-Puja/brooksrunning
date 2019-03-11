<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{   
    protected $fillable = ['order_id', 'variant_id', 'style', 'colour', 'image', 'qty','promo_code','discount','discount_xml', 'loyalty_id', 'price', 'price_sale','total'];
    
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function variant()
    {
        return $this->belongsTo('App\Models\Variant');
    }

}
