<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calender extends Model
{
    protected $table = 'calender';
    protected $fillable = ['nama','status','tgl_mulai','tgl_selesai'];
}
