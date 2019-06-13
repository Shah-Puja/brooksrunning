<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icontact_pushmail extends Model
{
    protected $table = 'icontact_pushmail';
    protected $fillable = ['source','email', 'comp_name','fname','lname','gender','dob','age_group','postcode','shoe_wear', 'country', 'answer', 'list_id','training_for','likes_to_run','experience_preference','updated_at','created_at']; 
}
