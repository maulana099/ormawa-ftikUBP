<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaKegiatan;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Event;

class KegiatanController extends Controller
{
	public function eventFtik(Request $request){
	
		$fil = $request->filter;
		$cari = $request->search;
		if ($request) {
			if (Auth::user()->ormawa) {
				$data_event = Event::where('unit', Auth::user()->ormawa)
				->where('nama_event','like',"%".$cari."%")
				->where('unit','like',"%" .$fil. "%")
				->paginate(10);
			}

			if (Auth()->user()->ormawa == 'FTIK') {
                $data_event = Event::latest()
                ->where('nama_event','like',"%" .$cari. "%")
                ->where('unit','like',"%" .$fil. "%")
                ->paginate(10); 
            }

		}
			return view('admin.event', ['data_event' => $data_event]);
}

	public function uploadE(Request $request){
		$file_event=array();
		if($files=$request->file('file_event')){
			foreach($files as $file){
				$new_gambar=$file->getClientOriginalName();
				$file->move('public/gambar',$new_gambar);
				$file_event[]=$new_gambar;
				/*Insert your data*/
				DB::table('event')->insert([
					'user_id' => Auth::user()->id,
					'unit' => Auth::user()->ormawa,
					'nama_event' => $request->nama_event,
					'file_event' => $new_gambar
				]);
				/*Insert your data*/
			}
		}
		alert()->success('Event Berhasil Di Upload', 'Success Upload');
		return redirect('/event');
	}

	public function editE(){

	}

	public function updateE(){

	}

	public function hapusE($id){
		$data_event = Event::find($id);
		$data_event->delete();
		alert()->success('Event Berhasil Di Hapus', 'Deleted');
		return redirect ('/event');
	}
}
