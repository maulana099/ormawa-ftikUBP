<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sketerangan extends Model
{
	protected $table = 'sk';
	protected $fillable = ['user_id','kegiatan','unit','file_sk','notes','status', 'acc_sk'];

	public function user(){
		return $this->belongsTo(User::class, "id");
	}
	// protected $appends = ['status'];
	// public function getStatusLabelAttribute()
	// {
	// 	if ($this->status == 'Pengajuan SK') {
	// 		return '<h1 style="background-color: #ea5e5e; padding: 2px 5px 2px 5px; border-radius: 5px; color: white; font-size: 12px;">Pengajuan SK</h1>';

	// 	} elseif ($this->status == 'proses') {
	// 		return '<span style="background-color: #5a7702; padding: 2px 5px 2px 5px; border-radius: 5px; color: white;">Proses</span>';
	// 	}
	// 	return '<span style="background-color: yellow; padding: 2px 5px 2px 5px; border-radius: 5px; color: black; font-size: 12px;">Selesai</span>';
	// }


}
