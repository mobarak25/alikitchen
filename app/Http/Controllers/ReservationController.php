<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller{

	public function reserv(Request $request){

		$reservation = new Reservation();

		$reservation->name           = $request->name;
		$reservation->phone          = $request->phone;
		$reservation->email          = $request->email;
		$reservation->date_and_time  = $request->date_and_time;
		$reservation->message        = $request->message;
		$reservation->status         = false;
		$reservation->save();

		return redirect()->route('welcome');
	}
}
