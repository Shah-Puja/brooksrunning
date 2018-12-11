<?php

namespace App\Events;

//use App\Models\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
class SubscriptionReceived
{
    use Dispatchable, SerializesModels;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(App\Models\User $user)
    {
        $this->user = $user;        
    }
}
