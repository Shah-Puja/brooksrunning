<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icontact_pushmail extends Model
{
    protected $table = 'icontact_pushmail';
    protected $fillable = ['source','email', 'comp_name','fname','lname','gender','birth_day','birth_month','age_group','postcode','phone','shoe_wear','city','state', 'country', 'answer', 'list_id','happy_runner_comp','training_for','likes_to_run','experience_preference','updated_at','created_at']; 
}
