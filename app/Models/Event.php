<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $casts = [
        'start_dt' => 'date',
        'end_dt' => 'date',
        'next_dt' => 'date'
    ];
    const CREATED_AT = null;
}
