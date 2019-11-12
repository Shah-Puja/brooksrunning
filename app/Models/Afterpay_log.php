<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afterpay_log extends Model
{
    protected $table = 'afterpay_log';
    protected $fillable = ['error_type','url','api','body','error_response','http_error'];

    public static function createNew($logger){
        self::create($logger); 
    }

}
