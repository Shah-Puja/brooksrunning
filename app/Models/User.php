<?php

namespace App\Models;

//use App\Events\SubscriptionReceived;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'person_idx','first_name','last_name', 'email', 'password', 'gender', 'birth_date', 'birth_month', 'shoe_wear',
        'age_group', 'state', 'postcode', 'newsletter', 'source', 'user_type','contest_code','country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    /*protected $dispatchesEvents = [
        'created' => SubscriptionReceived::class,
    ];*/

    public function orders(){
        return $this->hasMany('App\Models\Order','user_id','id');
    }
}
