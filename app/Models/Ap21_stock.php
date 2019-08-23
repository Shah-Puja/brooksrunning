<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ap21_stock extends Model
{
    protected $table = 'ap21_stock';
    protected $fillable = ['skuidx','stock'];
    public function variant()
    {
    	return $this->hasOne('App\Models\Variant','skuidx','id');
    }     
}
