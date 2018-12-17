<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;

class ReservationController extends Controller{


	public function index(){
		$reservations = Reservation::all();

		return view('admin.reservation.index', compact('reservations'));
	}

	public function status($id){
		$status = Reservation::find($id);
		if($status->status == false){
			$status->status = true;
			$status->save();
		}

		return redirect()->route('reservation.index');

	}
}
