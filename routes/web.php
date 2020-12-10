<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/login','UserController@login')->name('login');
Route::post('/postlogin','UserController@postlogin');
Route::get('/logout','UserController@logout');
Route::get('/reset','UserController@reset');
Route::get('/resetPass','UserController@resetPass');
Route::post('/forgot_password','UserController@forgot');

Route::get('/edit/user/{id}','UserController@edit_user');

Route::group(['middleware' => ['auth','chekrole:Dekanat,Ormawa,BEM,BLM,Master,TU,DPM,KaProdi']],function(){
	Route::get('/ormawa-ftik','HomeController@home');
	Route::get('/task','AgendaKegiatanController@task');

	Route::get('/dokumentasi','DokumentasiController@dokKegiatan');
	Route::get('/dokumentasi/{id}','DokumentasiController@view_dokumentasi');
	Route::get('/tambah/dokumentasi/{id}','DokumentasiController@gambar');
	Route::post('/tambah/dokumentasi/add/{id}','DokumentasiController@upload_gambar');
	Route::get('/dokumentasi/hapus/{id}','DokumentasiController@hapus_dokumentasi');
	Route::get('/dokumentasi/edit/{id}','DokumentasiController@edit_dokumentasi');
	Route::put('/dokumentasi/update/{id}','DokumentasiController@update_dokumentasi');

	//jadwal
	Route::get('/agenda-kegiatan','AgendaKegiatanController@agenda');
	Route::post('/agenda-kegiatan/add','AgendaKegiatanController@jadwal');
	Route::get('/agenda-kegiatan/hapus/{id}','AgendaKegiatanController@hapus_jadwal');
	Route::get('/agenda-kegiatan/edit/{id}','AgendaKegiatanController@edit_jadwal');
	Route::post('/agenda-kegiatan/update/{id}','AgendaKegiatanController@update_jadwal');

	
	Route::get('/agenda-kegiatan/{id}','AgendaKegiatanController@programkerja');
	//perencanaan
	Route::get('/agenda-kegiatan/perencanaan/{id}','AgendaKegiatanController@insert');
	Route::post('/agenda-kegiatan/perencanaan/insert/{id}','AgendaKegiatanController@insert_rencana');
	Route::get('/agenda-kegiatan/perencanaan/edit/{id}','AgendaKegiatanController@edit_rencana');
	Route::post('/agenda-kegiatan/perencanaan/update/{id}','AgendaKegiatanController@update_rencana');
	// pengajuanKembali
	Route::get('/agenda-kegiatan/pengajuan/{id}','AgendaKegiatanController@kembali');
	Route::post('/agenda-kegiatan/pengajuanKembali/{id}','AgendaKegiatanController@pengajuanKembali');
	
	//lpj == pelaksana
	Route::get('/agenda-kegiatan/lpj/{id}','AgendaKegiatanController@pelaksana');
	Route::post('/agenda-kegiatan/lpj/insert/{id}','AgendaKegiatanController@insert_pelaksana');
	Route::get('/agenda-kegiatan/lpj/edit/{id}','AgendaKegiatanController@edit_pelaksana');
	Route::post('/agenda-kegiatan/lpj/update/{id}','AgendaKegiatanController@update_pelaksana');
	
	//upload dokumen
	Route::get('/dokumen','DokumenController@adm');
	Route::post('/dokumen/tambah','DokumenController@tambahD');
	Route::get('/dokumen/edit/{id}','DokumenController@editdok');
	Route::post('/dokumen/update/{id}','DokumenController@updatedok');
	Route::get('/dokumen/hapus/{id}','DokumenController@hapusdok');
	
	// pengajuan SK
	Route::get('/sk','DokumenController@sk');
	Route::post('/sk/upload','DokumenController@skPost');
	Route::get('/sk/edit/{id}','DokumenController@skEdit');
	Route::put('/sk/update/{id}','DokumenController@skUpdate');
	Route::get('/sk/hapus/{id}','DokumenController@skHapus');
	Route::get('/cek/sk/{id}','DokumenController@skCek');

	Route::get('/event','KegiatanController@eventFtik');
	Route::post('/event/tambah','KegiatanController@uploadE');
	Route::get('/event/hapus/{id}','KegiatanController@hapusE');

	Route::get('/profil/','ProfilController@bemftik');	
	Route::post('/profil/add','ProfilController@add');
	Route::get('/profil/hapus/{id}','ProfilController@hapus');
	Route::get('/profil/edit/{id}','ProfilController@edit');
	Route::put('/profil/update/{id}','ProfilController@update');
	Route::get('/profil/status/{id}','ProfilController@status');
	Route::post('/profil/status-anggota/{id}','ProfilController@statusAnggota');

	Route::post('/add/calender','CalenderContrller@calender');
});


Route::group(['middleware' => ['auth','chekrole:TU,DPM,Dekanat,KaProdi']], function(){
	// Route::get('/filter','ApproveController@filter'); 
	//-----------dosen
	Route::get('/proker','ApproveController@prokerOrmawa');
	Route::get('/approved/proker/{id}','ApproveController@prokerApproved');
	Route::post('/agenda-kegiatan/approved/{id}/proker','ApproveController@approve_proposal');
	Route::post('/agenda-kegiatan/approved/{id}/lpj','ApproveController@approve_lpj');
	Route::get('/agenda-kegiatan/approve/{id}/kegiatan','ApproveController@details');
	
	// approved TU
	Route::get('/sk/ormawa','ApproveController@skTU');
	Route::get('/approved/sk/{id}','ApproveController@skApproved');
	Route::put('/approved/sk/cek/{id}','ApproveController@approved');
});

Route::group(['middleware' => ['auth','chekrole:Master']], function(){
	//-----------master
	Route::post('/postregister','UserController@postregister');
	Route::get('/account','UserController@account');
	Route::get('/account/hapus/{id}','UserController@hapus');
	Route::get('/account/edit/{id}','UserController@edit_user');
	Route::post('/account/update/{id}','UserController@update_user');
});

//------------------------user
Route::get('/','DashboardController@dashboard');
Route::get('/event/{id}','DashboardController@event');
Route::get('/more/event','DashboardController@more');
Route::get('/program-kerja','DashboardController@kerja');
Route::get('/anggota-bem','DashboardController@anggota');

