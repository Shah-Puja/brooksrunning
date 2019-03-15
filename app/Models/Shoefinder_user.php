<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shoefinder_user extends Model
{
    protected $table = 'shoefinder_user';
    protected $fillable = ['id','user_id', 'string',];

    public static function createOrGetForUser($request) {
        $shoefinder_user = self::firstOrCreate(
			['id' => session('shoefinder_user_id')],
			['user_id' => auth()->id() ?? null, 'string' =>  $request->fullUrl()]
        );
        session()->put('shoefinder_user_id', $shoefinder_user->id);
        return $shoefinder_user;
    }


    public static function updateOrGetForUser($request) {
        $shoefinder_user = self::updateOrCreate(
			['id' => session('shoefinder_user_id')],
			['user_id' => auth()->id() ?? null, 'string' =>  $request->fullUrl()]
        );
        return $shoefinder_user;
    }



}
