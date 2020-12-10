<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventCalender;

class CalenderController extends Controller
{
    public function calender(Request $request){
    	$evenst = EventCalender::all();
    	$evenst = [];
    	$selesai = $row->$tgl_selesai."24:00:00";
    	foreach ($evenst as $row) {
    	 	$evenst[] = \Calender::event(
    	 		$row->nama,
    	 		true,
    	 		new \DateTime($row->tgl_mulai),
    	 		new \DateTime($row->tgl_selesai),
    	 		$row->id,
    	 		[
    	 			'status' => $row->status,
    	 		]
    	 	);
    	 }

    	 $calender = \Calender::addEvents($event);
    }



}

