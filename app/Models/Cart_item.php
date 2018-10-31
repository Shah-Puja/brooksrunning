<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{   
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cart_id', 'variant_id', 'sku', 'discount_detail',  'discount_price', 'price_sale', 'price', 'qty'];

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function variant()
    {
        return $this->belongsTo('App\Models\Variant');
    }

}
