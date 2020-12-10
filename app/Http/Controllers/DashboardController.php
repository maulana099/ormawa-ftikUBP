<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Gambar;
use App\Dokumentasi;
use App\AgendaKegiatan;
use DB;
use App\ProfilBEM;

class DashboardController extends Controller
{
    public function dashboard(){
    	$data_event = Event::latest()->paginate(4);
        
        $dokumentasi = Dokumentasi::paginate(8);
        $data_anggota = ProfilBEM::latest()->paginate(4);
    	return view ('user.index',compact('data_event','dokumentasi','data_anggota'));
    }

    public function event($id){
        $data_event = Event::find($id);

        // other
        $other_event = Event::latest()->paginate(4);
    	return view ('user.event',compact('data_event','other_event'));
    }

    public function more(){
        $data_event = Event::latest()->paginate(16);
    	return view ('user.more-event',compact('data_event'));
    }

    public function kerja(Request $request){
        $data_proker = AgendaKegiatan::latest()->paginate(10);

        // pencarian
        $bulan = $request->month;
        $unit = $request->filter;
        $cari = $request->cari;
        if ($request) {
            $data_proker = DB::table('agenda-kegiatan')
            ->where('waktu','like',"%".$bulan."%")
            ->where('kegiatan','like',"%" .$cari. "%")
            ->where('unit','like',"%" .$unit. "%")
            ->paginate(10);
        }else{
            $data_proker = "Data tidak ada";
        }

        return view ('user.proker-ormawa',compact('data_proker'));
    }

    public function anggota(){
        $data_anggota = ProfilBEM::latest()->paginate(30);
        return view('user.anggota-bem',compact('data_anggota'));
    }
}
