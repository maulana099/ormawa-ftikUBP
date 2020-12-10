<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaKegiatan;
use App\Dokumentasi;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon;
use Alert;


class AgendaKegiatanController extends Controller
{	
	public function task(Request $request){
		$data_task = AgendaKegiatan::latest()->paginate(10);

		// pencarian
		$bulan = $request->month;
		$unit = $request->filter;
		$cari = $request->get('cari');
		if ($request) {
			$data_task = DB::table('agenda-kegiatan')
			->where('waktu','like',"%".$bulan."%")
			->where('kegiatan','like',"%" .$cari. "%")
			->where('unit','like',"%" .$unit. "%")
			->paginate(10);
		}else{
			$data_task = "Data tidak ada";
		}
		return view ('admin.task',compact('data_task'));
	}

	public function agenda(Request $request){
		$data_agenda = Auth::user()->agenda()->paginate(10);

		$results = $request->search;
		if ($results) {
			$data_agenda = Auth::user()->agenda()->where('kegiatan','like',"%".$results."%")
			->paginate(10);
		}
		
		return view('admin.agenda-kegiatan', ['data_agenda' => $data_agenda]);
	}

	public function programkerja($id){
		$data_proker = AgendaKegiatan::where('id', $id)->first();
		$data_dokumentasi = Dokumentasi::where('agenda_id', '=', $data_proker->id)->get();
		return view ('admin.program-kerja',compact('data_proker','data_dokumentasi'));
	}

	public function jadwal(Request $request){
		$data_agenda = new AgendaKegiatan();
		$data_agenda->user_id = Auth::user()->id;
		$data_agenda->kegiatan = $request->get('kegiatan');
		$data_agenda->unit = Auth::user()->ormawa;
		$data_agenda->tempat = $request->get('tempat');
		$data_agenda->waktu = $request->get('waktu');
		$data_agenda->status = 'Belum Terlaksana';
		$data_agenda->save();
		alert()->success('Program Kerja Telah Di Input', 'Success');
		return redirect ('/agenda-kegiatan');
	}

	public function insert(Request $request, $id){
		$data_agenda = AgendaKegiatan::find($id);
		return view ('admin.insert-rencana',compact('data_agenda'));
	}

	public function edit_jadwal($id){
		$data_agenda = AgendaKegiatan::find($id);
		return view('admin.edit-jadwal',compact('data_agenda'));
	}

	public function update_jadwal(Request $request, $id){
		$data_agenda = AgendaKegiatan::find($id);
		$data_agenda->kegiatan = $request->get('kegiatan');
		$data_agenda->unit = Auth::user()->ormawa;
		$data_agenda->tempat = $request->get('tempat');
		$data_agenda->waktu = $request->get('waktu');
		$data_agenda->save();
		alert()->info('Program Kerja Berhasil Di Update', 'Updated Success');
		return redirect ('/agenda-kegiatan');
	}

	public function hapus_jadwal($id){
		$data_agenda = AgendaKegiatan::find($id);
		$data_agenda->delete();
		alert()->success('Program Kerja Berhasil Di Hapus', 'Deleted Success');
		return redirect ('/agenda-kegiatan');
	}

	public function insert_rencana(Request $request, $id){
		// first to exist
		$data_agenda = AgendaKegiatan::where('id', $id)->first();
		$data_agenda->suratP = $request['suratP'];
		$data_agenda->proposal = $request['proposal'];
		$data_agenda->status = 'Pengajuan Proposal';
		$data_agenda->ket = $request['ket'];

		if(empty($request->file('suratP','proposal')))
		{
			$data_agenda->suratP = $data_agenda->suratP;
			$data_agenda->proposal = $data_agenda->proposal;
		} 
		else
		{
			$file       = $request->file('suratP');
			$new_surat   = $file->getClientOriginalName();
			$request->file('suratP')->move("public/dokumen/", $new_surat);
			$data_agenda->suratP = $new_surat;

			$file       = $request->file('proposal');
			$new_proposal   = $file->getClientOriginalName();
			$request->file('proposal')->move("public/dokumen", $new_proposal);
			$data_agenda->proposal = $new_proposal;
		}

		$data_agenda->update();
		alert()->success('Proposal Berhasil Diajukan Tunggu Proses Selanjutnya', 'Success');
		return redirect('/agenda-kegiatan');
	}

	public function edit_rencana($id){
		$data_agenda = AgendaKegiatan::find($id);
		return view ('admin.edit-rencana',compact('data_agenda'));
	}

	public function update_rencana(Request $request, $id){
		$data_agenda = AgendaKegiatan::where('id', $id)->first();
		$data_agenda->ket = $request['ket'];

		if($request->file('suratP'))
		{	
			$file       = $request->file('suratP');
			$new_surat   = $file->getClientOriginalName();
			$request->file('suratP')->move("public/dokumen/", $new_surat);
			$data_agenda->suratP = $new_surat;
		} 

		if($request->file('proposal'))
		{	
			$file       = $request->file('proposal');
			$new_proposal   = $file->getClientOriginalName();
			$request->file('proposal')->move("public/dokumen", $new_proposal);
			$data_agenda->proposal = $new_proposal;
		} 

		$data_agenda->update();
		alert()->info('Proposal Berhasil DiUpdate', 'Updated Success');
		return redirect('/agenda-kegiatan');
	}


	// Pengajuan proposal kembali
	public function kembali(Request $request, $id){
		$data_agenda = AgendaKegiatan::find($id);
		return view ('admin.pengajuan-kembali',compact('data_agenda'));
	}

	public function pengajuanKembali(Request $request, $id){
		$data_agenda = AgendaKegiatan::where('id', $id)->first();
		$data_agenda->ket = $request['ket'];
		$data_baru = $data_agenda->status;

		if ($data_baru == "Revisi KaProdi") {
			$data_new = "Pengajuan Kaprodi";
		}else{
			$data_new = "Pengajuan Dekan";
		}
		$data_agenda->status = $data_new; 

		if($request->file('suratP'))
		{	
			$file       = $request->file('suratP');
			$new_surat   = $file->getClientOriginalName();
			$request->file('suratP')->move("public/dokumen/", $new_surat);
			$data_agenda->suratP = $new_surat;
		} 

		if($request->file('proposal'))
		{	
			$file       = $request->file('proposal');
			$new_proposal   = $file->getClientOriginalName();
			$request->file('proposal')->move("public/dokumen", $new_proposal);
			$data_agenda->proposal = $new_proposal;
		} 
		
		$data_agenda->update();
		alert()->warning('Proposal Berhasil Di ajkukan Kembali', 'Success');
		return redirect('/agenda-kegiatan');
	}

	// Controller LPJ
	public function pelaksana($id){
		$data_agenda = AgendaKegiatan::find($id);
		return view ('admin.insert-pelaksana',compact('data_agenda'));
	}

	public function insert_pelaksana(Request $request, $id){
		$data_agenda = AgendaKegiatan::where('id', $id)->first();
		$data_agenda->berita_acara = $request['berita_acara'];
		$data_agenda->lpj = $request['lpj'];
		$data_agenda->keterangan = $request['keterangan'];
		$data_agenda->status = 'Pengajuan LPJ';

		if ($request->file('berita_acara','lpj') == "") {
			$data_agenda->berita_acara = $data_agenda->berita_acara;
			$data_agenda->lpj = $data_agenda->lpj;
		}
		else {
			$file = $request->file('berita_acara');
			$new_berita = $file->getClientOriginalName();
			$request->file('berita_acara')->move("public/dokumen/",$new_berita);
			$data_agenda->berita_acara = $new_berita;

			$file = $request->file('lpj');
			$new_lpj = $file->getClientOriginalName();
			$request->file('lpj')->move("public/dokumen/", $new_lpj);
			$data_agenda->lpj = $new_lpj;
		}
		$data_agenda->update();
		alert()->success('LPJ berhasil Di Ajukan Tunggu Proses Selanjutnya', 'Success');
		return redirect ('/agenda-kegiatan');
	}

	public function edit_pelaksana($id){
		$data_agenda = AgendaKegiatan::find($id);
		return view ('admin.edit-pelaksanaan',compact('data_agenda'));
	}

	public function update_pelaksana(Request $request, $id){
		$data_agenda = AgendaKegiatan::where('id', $id)->first();
		if($request->file('berita_acara'))
		{	
			$file = $request->file('berita_acara');
			$new_berita = $file->getClientOriginalName();
			$request->file('berita_acara')->move("public/dokumen/",$new_berita);
			$data_agenda->berita_acara = $new_berita;
		} 

		if($request->file('lpj'))
		{	
			$file = $request->file('lpj');
			$new_lpj = $file->getClientOriginalName();
			$request->file('lpj')->move("public/dokumen/",$new_lpj);
			$data_agenda->lpj = $new_lpj;
		}

		$data_agenda->update();
		alert()->info('LPJ Berhasil Di Update', 'Updated Success Success');
		return redirect ('/agenda-kegiatan');
	}

	// dokeumentasi kegiatan
	public function dokeumentasi(){
		$data_gambar = new Gambar();
		return view ('admin.gambar',compact('data_gambar'));
	}
}
