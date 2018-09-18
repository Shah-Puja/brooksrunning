<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'p_products';    

    public function categories()
    {
    	return $this->morphedByMany('App\Category', 'group');
    }
    public function variants()
    {
    	return $this->hasMany('App\Variant');
    }

    
}
