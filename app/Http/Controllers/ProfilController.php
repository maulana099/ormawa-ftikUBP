<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfilBEM;
use Auth;
use App\User;
use DB;
use Alert;

class ProfilController extends Controller
{
	public function bemftik(){

		$data_profil = Auth::user()->profil()->paginate(20);


		$data_ftik = Auth()->user()->where('FTIK', $data_profil);
		if($data_ftik) {
			$data_profil = ProfilBEM::latest()->paginate(10);   
		}

		return view('admin.profil',compact('data_profil'))->with('i',(request()->input('page',1) -1) * 10);
	}

	public function add(Request $request){
		$request->validate([
			'nama' => 'required',
			'jabatan' => 'required',
			'nim' => 'required',
			'no_hp' => 'required',
			'fotoP' => 'required|file|mimes:png,jpg,jpeg|max:3048',
		]);

		$fotoP = $request->file('fotoP');
		$new_foto = $fotoP->getClientOriginalName();
		$fotoP->move('public/gambar/' ,$new_foto);

		$data_profil = array(
			'user_id' => Auth::user()->id,
			'unit' => Auth::user()->ormawa,
			'status' => "active",
			'nama' => $request->nama,
			'jabatan' => $request->jabatan,
			'nim' => $request->nim,
			'no_hp' => $request->no_hp,
			'fotoP' => $new_foto
		);

		ProfilBEM::create($data_profil);
		alert()->success('Anggota Berhasil Di Tambahkan', 'Success');
		return redirect ('/profil');
	}

	public function edit($id){
		$data_profil = ProfilBEM::find($id);
		return view ('admin.profil-edit', compact('data_profil'));
	}

	public function update(Request $request, $id){
		$data_profil = ProfilBEM::where('id', $id)->first();
		$data_profil->nama = $request['nama'];
		$data_profil->jabatan = $request['jabatan'];
		$data_profil->nim = $request['nim'];
		$data_profil->no_hp = $request['no_hp'];

		if($request->file('fotoP'))
		{	
			$file       = $request->file('fotoP');
			$new_foto   = $file->getClientOriginalName();
			$request->file('fotoP')->move("public/gambar", $new_foto);
			$data_profil->fotoP = $new_foto;
		} 

		$data_profil->update();
		alert()->success('Anggota Berhasil Di Update', 'Updated');
		return redirect('/profil');
	}

	public function hapus($id){
		$data_profil = ProfilBEM::find($id);
		$data_profil->delete();
		alert()->success('Data Anggota Berhasil Di Hapus', 'Deleted');
		return redirect ('/profil');
	}

	public function status($id){
		$data_profil = ProfilBEM::find($id);
			return view ('admin.profil-status',compact('data_profil'));
	}

	public function statusAnggota(Request $request, $id){
		DB::table('profil')->where('id', $id)->update([
			'status' => $request->status,
		]);
		alert()->warning('Status Anggota Di Perbaharui.', 'Success');
		return redirect ('/profil');
	}
}
