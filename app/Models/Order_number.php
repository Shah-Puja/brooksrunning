<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_number extends Model
{
    protected $fillable = ['order_no', 'order_id'];
    protected $table = 'order_number';
}
