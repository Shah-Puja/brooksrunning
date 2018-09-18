<?php

namespace App\Models;

use App\Events\SubscriptionReceived;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $dispatchesEvents = [
        'created' => SubscriptionReceived::class,
    ];

    protected $fillable = ['email'];	
}
