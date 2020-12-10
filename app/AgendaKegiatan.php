<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendaKegiatan extends Model
{
    protected $table = 'agenda-kegiatan';
    protected $fillable = ['kegiatan','unit','waktu','tempat','suratP','proposal','ket','berita_acara','lpj','status'];


   public function user(){
    	return $this->belongsTo(User::class);
    }

   // public function userKegiatan(){
   // 	return $this->belongsToMany(User::class)->withPivot('file_gambar');
   // }
}
