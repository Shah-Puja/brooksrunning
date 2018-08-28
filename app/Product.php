<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'prod_mast';
    protected $primaryKey = 'prod_id';

    public function variations()
    {
    	return $this->hasMany('App\Variation', 'style_idx', 'style_idx');
    }
}
