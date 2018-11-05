<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUsEnquiry extends Model
{
    protected $fillable = ['fname','lname', 'phone', 'email', 'subject', 'order_no', 'category'];
}
