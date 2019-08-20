<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo_mast extends Model
{
    protected $table = 'promo_mast';

    // protected $fillable = [
    //     'promo_mast_id','promo_string','promo_code','skuidx','promo_type','promo_title','promo_desc',
    //     'promo_display_text','start_dt','end_dt','discount','discount_type','active','created_dt'
    // ];
    const UPDATED_AT = null;
    const CREATED_AT = null;

    protected $casts = [
        'start_dt' => 'datetime',
        'end_dt' => 'datetime'
    ];

    protected $primaryKey = 'promo_mast_id';
}
