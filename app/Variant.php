<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    //
    protected $table = 'p_variants';
    
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    
}
