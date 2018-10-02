<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'p_tags';        
    public function product()
    {
    	return $this->belongsTo('App\Models\Product');
    }
}


