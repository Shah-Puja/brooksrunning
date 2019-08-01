<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ap21_log extends Model
{
    protected $table = 'ap21_log';
    protected $fillable = ['process','order_id','log_title','log_type','log_status','result','xml','transaction_id','transaction_result'];

    public static function createNew($logger){
        self::create($logger); 
    }
}
