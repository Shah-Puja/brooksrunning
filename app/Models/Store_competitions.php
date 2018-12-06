<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store_competitions extends Model
{
    protected $fillable = ['competition_name','slug','name', 'email', 'gender', 'post_code', 'store_name', 'shoe_size'];
}
