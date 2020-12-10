<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = ['user_id','unit','nama_event','file_event'];

    public function event(){
    	return $this->belongsTo(User::class, "id");
    }
}
