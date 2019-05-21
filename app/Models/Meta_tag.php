<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meta_tag extends Model
{
    protected $table = 'meta_details';
    protected $primaryKey = 'id'; 
    protected $fillable = ['url', 'title', 'description' ];
}
