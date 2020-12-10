<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilBEM extends Model
{
    protected $table = 'profil';
    protected $fillable = ['user_id','unit','nama','jabatan','nim','fotoP','no_hp','status'];

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
