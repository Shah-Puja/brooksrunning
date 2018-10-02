<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_address extends Model
{
    protected $fillable = ['order_id', 'email', 'b_fname', 'b_lname', 'b_add1', 'b_add2', 'b_city', 'b_state', 'b_postcode', 'b_phone', 
    'flag_same_shipping', 's_fname', 's_lname', 's_add1', 's_add2', 's_city', 's_state', 's_postcode', 's_phone', 
    'order_info', 'signme', 'nosignaturedelivery'];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public static function prepareAddressForSaving($address) {
        $address['signme'] = isset($address['signme']) ? 1 : 0;
        $address['nosignaturedelivery'] = isset($address['nosignaturedelivery']) ? 1 : 0;
        if ( $address['flag_same_shipping'] == "Yes" ) {
            $address['b_fname'] = $address['s_fname'];
            $address['b_lname'] = $address['s_lname'];
            $address['b_add1'] = $address['s_add1'];
            $address['b_add2'] = $address['s_add2'];
            $address['b_city'] = $address['s_city'];
            $address['b_state'] = $address['s_state'];
            $address['b_postcode'] = $address['s_postcode'];
            $address['b_phone'] = $address['s_phone'];
        }
    
        return $address;
    }

    public function isValid()
    {
        return strlen($this->s_fname) > 0 && strlen($this->s_add1) > 0 && strlen($this->s_postcode) > 0;
    }

}
