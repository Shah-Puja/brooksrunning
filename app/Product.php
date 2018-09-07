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
}
