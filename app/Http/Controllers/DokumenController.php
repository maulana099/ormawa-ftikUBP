<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use App\Sketerangan;
use App\User;
use Auth;
use DB;
use Alert;

class DokumenController extends Controller
{
	public function adm(Request $request){ 
		$data_dokumen = Dokumen::latest()->paginate(10);

		$fil = $request->filter;
		$cari = $request->search;
		if ($request) {
			$data_dokumen = DB::table('dokumen')
			->where('nama_file','like',"%".$cari."%")
			->where('unit','like',"%".$fil."%")
			->paginate(10);
		}else{
			$data_dokumen = "Data tidak ada";
		}

		return view ('admin.dokumen',compact('data_dokumen'))->with('i',(request()->input('page',1) -1) * 10);
	}
	
	public function tambahD(Request $request){
		$file_dokumen=array();
		if($files=$request->file('file_dokumen')){
			foreach($files as $file){
				$new_dok=$file->getClientOriginalName();
				$file->move('public/dokumen',$new_dok);
				$file_dokumen[]=$new_dok;
				/*Insert your data*/
				DB::table('dokumen')->insert([
					'nama_file' => $request->nama_file,
					'unit' => Auth::user()->ormawa,
					'file_dokumen' => $new_dok,
				]);
				/*Insert your data*/
			}
		}
		Alert::success('Dokumen Berhasil Di Tambahkan', 'Success');
		return redirect ('/dokumen');
	}

	public function editdok($id){
		$data_dokumen = Dokumen::find($id);
		return view ('admin.edit-dokumen',compact('data_dokumen'));
	}

	public function updatedok(Request $request, $id){
		$data_dokumen = Dokumen::where('id', $id)->first();
		$data_dokumen->nama_file = $request['nama_file'];

		if($request->file('file_dokumen'))
		{	
			$file       = $request->file('file_dokumen');
			$new_file   = $file->getClientOriginalName();
			$request->file('file_dokumen')->move("public/dokumen", $new_file);
			$data_dokumen->file_dokumen = $new_file;
		} 

		$data_dokumen->update();
		Alert::success('Dokumen Berhasil Update', 'Updated Success');
		return redirect('/dokumen');
	}

	public function hapusdok($id){
		$data_dokumen = Dokumen::find($id);
		$data_dokumen->delete();
		Alert::success('Dokumen Berhasil Dihapus', 'Deleted Success');
		return redirect('/dokumen');
	}

	//sk
	public function sk(Request $request){
		// $data_sk = Auth::user()->sk()->paginate(10);
		
		$fil = $request->filter;
		$cari = $request->search;
		if ($request) {
			$data_sk = Auth::user()->sk()
			->where('kegiatan','like',"%".$cari."%")
			->where('unit','like',"%".$fil."%")
			->paginate(10);
		}else{
			$data_sk = "Data tidak ada";
		}

		return view ('admin.sk',['data_sk' => $data_sk]);
	}

	public function skPost(Request $request){
		$request->validate([
			'kegiatan' => 'required',
			'notes' => 'required',
			'file_sk' => 'required|file|mimes:pdf,docx,xlsx|max:3048',
		]);

		// return $request;

		$file_sk = $request->file('file_sk');
		$new_sk = $file_sk->getClientOriginalName();
		$file_sk->move(public_path('dokumen/'),$new_sk);

		$data_sk = array(
			'user_id' => Auth::user()->id,
			'kegiatan' => $request->kegiatan,
			'notes' => $request->notes,
			'unit' => Auth::user()->ormawa,
			'status' => 'Pengajuan SK',
			'file_sk' => $new_sk
		);
			// return $data_sk;

		Sketerangan::create($data_sk);
		Alert::info('SK Berhasil Diajukan Tunggu Proses Selanjutnya', 'Success'); 
		return redirect ('/sk');
	}

	public function skEdit($id){
		$data_sk = Sketerangan::find($id);
		return view ('admin.sk-edit',compact('data_sk'));
	}

	public function skUpdate(Request $request, $id){
		$data_sk = Sketerangan::where('id', $id)->first();
		$data_sk->kegiatan = $request['kegiatan'];
		$data_sk->notes = $request['notes'];

		if($request->file('file_sk'))
		{	
			$file       = $request->file('proposal');
			$new_sk   = $file->getClientOriginalName();
			$request->file('proposal')->move("public/dokumen", $new_sk);
			$data_sk->proposal = $new_sk;
		} 

		$data_sk->update();
		Alert::success('SK berhasil Di Updated', 'Updated Success');
		return redirect('/sk');
	}

	public function skCek($id){
		$data_sk = Sketerangan::find($id);
		return view ('admin.sk-cek', ['data_sk' => $data_sk]);
	}

	public function skHapus($id){
		$data_sk = Sketerangan::find($id);
		$data_sk->delete();
		Alert::success('SK Berhasil Di Hapus', 'Deleted Success');
		return redirect('/sk');
	}

}
