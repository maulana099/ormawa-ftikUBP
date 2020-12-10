<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumentasi;
use App\AgendaKegiatan;
use App\Phimatif;
use Illuminate\Support\Facades\DB;
use Auth;
use Alert;

class DokumentasiController extends Controller
{

	public function view_dokumentasi($id){
		$data_proker = AgendaKegiatan::where('id', $id)->first();
		$data_dokumentasi = Dokumentasi::where('agenda_id', '=', $data_proker->id)
		->paginate(12);
		return view ('admin.dokumentasi-kegiatan',compact('data_dokumentasi'));
	}

	public function gambar($id){
		$data_proker = AgendaKegiatan::where('id',$id)->first();
		$data_dokumentasi = Dokumentasi::latest()->paginate(10);
		return view ('admin.insert-dokumentasi',compact('data_dokumentasi','data_proker'));
	}

	public function upload_gambar(Request $request, $id){
		$file_gambar=array();
		if($files=$request->file('file_gambar')){
			foreach($files as $file){
				$new_foto=$file->getClientOriginalName();
				$file->move('public/dokumentasi',$new_foto);
				$file_gambar[]=$new_foto;
				/*Insert your data*/
				$data_proker = AgendaKegiatan::where('id', $id)->first();
				DB::table('dokumentasi')->insert([
					'user_id' => Auth::user()->id,
					'agenda_id' => $data_proker->id,
					'file_gambar' => $new_foto,
					'unit' => Auth::user()->ormawa,
					'keterangan' => $request->keterangan,
					'nama_kegiatan' => $data_proker->kegiatan
				]);
				/*Insert your data*/
			}
		}
		Alert::success('Dokumentasi Berhasil Di tambahkan', 'Success');
		return redirect('/agenda-kegiatan/' .$id);
	}

	public function edit_dokumentasi($id){
		$data_dokumentasi = Dokumentasi::find($id);
		return view ('admin.dokumentasi-edit', compact('data_dokumentasi'));
	}

	public function update_dokumentasi(Request $request, $id){
		$data_dokumentasi = Dokumentasi::where('id', $id)->first();
		$data_dokumentasi->keterangan = $request['keterangan'];


		if($request->file('file_gambar'))
		{	
			$file       = $request->file('file_gambar');
			$file_gambar   = $file->getClientOriginalName();
			$request->file('file_gambar')->move("public/dokumentasi", $file_gambar);
			$data_dokumentasi->file_gambar = $file_gambar;
		} 

		$data_dokumentasi->update();
		Alert::success('Dokumentasi Berhasil Di Updated', 'Updated Success');
		return redirect('/dokumentasi');
	}

	public function hapus_dokumentasi($id){
		$data_dokumentasi = Dokumentasi::find($id);
		$data_dokumentasi->delete();
		Alert::success('Dokumentasi Berhasil Dihapus', 'Deleted Success');
		return redirect('/dokumentasi');
	}

	//user
	public function dokKegiatan(Request $request){
		$fil = $request->filter;
		$cari = $request->search;
		if ($request) {
			if (Auth::user()->ormawa) {
				$data_dokumentasi = Dokumentasi::where('unit', Auth::user()->ormawa)
				->where('nama_kegiatan','like',"%".$cari."%")
				->where('unit','like',"%" .$fil. "%")
				->paginate(10);
			}

			if (Auth()->user()->ormawa == 'FTIK') {
                $data_dokumentasi = Dokumentasi::latest()
                ->where('nama_kegiatan','like',"%" .$cari. "%")
                ->where('unit','like',"%" .$fil. "%")
                ->paginate(10); 
            }

		}
			return view('admin.dokumentasi',['data_dokumentasi' => $data_dokumentasi]);
	}


}
