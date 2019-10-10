<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SimpleGv extends Model
{
    protected $table = 'sample_gv';
    protected $fillable = ['used'];
}
