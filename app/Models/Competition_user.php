<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition_user extends Model
{   
    protected $table = 'competition_user';
    protected $fillable = ['fname','lname', 'email', 'comp_name', 'comp_slug', 'gender', 'dob', 'age_group', 'postcode', 'shoe_wear', 'country', 'answer', 'comp_aweber_exist'];
}
