<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaKegiatan;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Sketerangan;
use App\User;
use Alert;

class ApproveController extends Controller
{
    public function prokerOrmawa(Request $request){

         //pencarian
        $bulan = $request->month;
        $unit = $request->filter;
        $cari = $request->get('cari');
        if ($request) {
            if (Auth::user()->ormawa) {
                $data_proker = AgendaKegiatan::where('unit', Auth::user()->ormawa)
                ->where('waktu','like',"%".$bulan."%")
                ->where('kegiatan','like',"%" .$cari. "%")
                ->where('unit','like',"%" .$unit. "%")
                ->paginate(10);
            }
            if (auth()->user()->ormawa == 'FTIK') {
                $data_proker = AgendaKegiatan::latest()
                ->where('waktu','like',"%".$bulan."%")
                ->where('kegiatan','like',"%" .$cari. "%")
                ->where('unit','like',"%" .$unit. "%")
                ->paginate(10); 
            }

        }

        return view('dosen.proker-ormawa',compact('data_proker'));
    }

    public function prokerApproved($id){
        $data_proker =  AgendaKegiatan::find($id);
        return view('dosen.proker-approve',compact('data_proker'));
    }

    public function detail_task($id){
        $data_task = AgendaKegiatan::find($id);
        return view ('dosen.task-detail',compact('data_task'));
    }

    public function approve_proposal(Request $request, $id){
        $data_task = AgendaKegiatan::find($id);
        $data_task->status = $request->get('status');
        $data_task->ket = $request->get('ket');
        
        if($request->file('proposal'))
        {   
            $file       = $request->file('proposal');
            $new_proposal   = $file->getClientOriginalName();
            $request->file('proposal')->move("public/dokumen/", $new_proposal);
            $data_task->proposal = $new_proposal;
        } 

        
        $data_task->save();
        alert()->info('Selected Status Proposal Berhasil', 'Success');
        return redirect ('/proker');
    }

    public function approve_lpj(Request $request, $id){
        $data_task = AgendaKegiatan::find($id);
        $data_task->status = $request->get('status');
        $data_task->keterangan = $request->get('keterangan');

        if($request->file('lpj'))
        {   
            $file       = $request->file('lpj');
            $new_lpj   = $file->getClientOriginalName();
            $request->file('lpj')->move("public/dokumen/", $new_lpj);
            $data_task->lpj = $new_lpj;
        } 

        $data_task->save();
        alert()->info('Selected Status Proposal Berhasil', 'Success');
        return redirect ('/proker');
    }

    // Approved TU
    public function skTU(Request $request){
        $data_sk = Sketerangan::latest()->paginate(10);

        $fil = $request->filter;
        $cari = $request->search;
        if ($request) {
            $data_sk = DB::table('sk')
            ->where('kegiatan','like',"%".$cari."%")
            ->where('unit','like',"%".$fil."%")
            ->paginate(10);
        }else{
            $data_sk = "Data tidak ada";
        }

        return view ('dosen.sk-tu',['data_sk' => $data_sk]);
    }

    public function skApproved($id){
        $data_sk = Sketerangan::find($id);
        return view ('dosen.sk-approve', ['data_sk' => $data_sk]);
    }

    public function approved(Request $request, $id){
        $data_sk = Sketerangan::find($id);
        $data_sk->status = $request->get('status');
        $data_sk->notes = $request->get('notes');

        if($request->file('acc_sk'))
        {   
            $file       = $request->file('acc_sk');
            $new_sk   = $file->getClientOriginalName();
            $request->file('acc_sk')->move("public/dokumen/", $new_sk);
            $data_sk->acc_sk = $new_sk;
        } 

        $data_sk->save();
        alert()->info('Selected SK Berhasil', 'Success');
        return redirect('/sk/ormawa');
    }

}
