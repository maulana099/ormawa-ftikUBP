<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
   protected $table = 'reminders';
   protected $fillable = ['user_id','email','code']; 
}
