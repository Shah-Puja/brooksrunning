<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    
    protected $table = 'p_variants';
    
    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }

    public function ap21stock()
    {
        return $this->hasOne('App\Models\Ap21_stock', 'skuidx', 'id');
    }
    
}
