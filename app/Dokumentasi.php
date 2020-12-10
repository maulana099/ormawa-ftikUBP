<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
    protected $table = 'dokumentasi';
    protected $fillable = ['user_id','agenda_id','unit','nama_kegiatan','file_gambar','keterangan'];

    public function agenda(){
    	return $this->belongsTo(AgendaKegiatan::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }
}
