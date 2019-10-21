<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $casts = [
         'start_dt' => 'datetime',
         'end_dt' => 'datetime',
         'next_dt' => 'datetime'
    ];
    const CREATED_AT = null;
}
