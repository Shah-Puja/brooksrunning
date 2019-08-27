<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    
    protected $table = 'p_variants';
    protected $fillable = ['stock', 'visible'];
    
    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }    

    
}
