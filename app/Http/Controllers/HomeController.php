<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProfilBEM;
use App\AgendaKegiatan;
use DB;
use Auth;
use App\Sketerangan;

class HomeController extends Controller
{
    public function home(){

		$data_profil = ProfilBEM::latest()->paginate(10);
		$profil_count = DB::table('profil')->selectRaw('count(*) count')->first();

		$profil['data_profil'] = $data_profil;
		$profil['profil_count'] = $profil_count;

		$data_proker = AgendaKegiatan::where('unit', Auth::user()->ormawa)->get();
		$proker_count = $data_proker->count();

		$data_sk = Sketerangan::where('unit', Auth::user()->ormawa)->get();
		$sk_count = Sketerangan::where('unit', Auth::user()->ormawa)->selectRaw('count(*) count')->first();

		$sk['data_sk'] = $data_sk;
		$sk['sk_count'] = $sk_count;

        return view('admin.index', compact('profil','data_profil','sk'))->with('proker_count', $proker_count);
    }
}
