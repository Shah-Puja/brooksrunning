<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Mail\Ap21Alert;
use Illuminate\Support\Facades\Mail;

class Ap21_error extends Model
{
    protected $table = 'ap21_error';
    protected $fillable = ['error_type','url','api','body','error_response','http_error'];

    public static function createNew($logger){
        self::create($logger); 
    }

    public static function store($error_object){
        self::createNew($error_object);

         Mail::to(config('site.notify_email'))
               ->cc(config('site.syg_notify_email'))
               ->send(new Ap21Alert($error_object));
    }
}
 