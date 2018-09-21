<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    /**
     * A variant belongs to a product
     */
    protected $table = 'p_variants';
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

}
