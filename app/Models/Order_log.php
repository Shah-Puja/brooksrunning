<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_log extends Model
{
    protected $table = 'order_log';
    protected $fillable = ['order_id','log_title','log_type','log_status','result','xml','nab_txnid','nab_result'];

    public static function createNew($logger){
        self::create($logger); 
    }
}
