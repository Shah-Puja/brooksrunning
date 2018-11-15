<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event_month extends Model
{
    protected $table = 'event_month';

    public function getMonthNameByID($id){
        $id = ($id == '13') ? '1' : $id;
        $id = ($id == '0') ? '12' : $id;
        $monthDetails = self::where('month_id','like',  $id)->first();
        return $monthDetails->month_name;
    }
}
