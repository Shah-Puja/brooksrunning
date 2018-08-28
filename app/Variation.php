<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    protected $table = 'prod_variation';
    protected $primaryKey = 'var_id';

    public function skus()
    {
    	return $this->hasMany('App\Sku', 'colour_idx', 'colour_idx');
    }

}
