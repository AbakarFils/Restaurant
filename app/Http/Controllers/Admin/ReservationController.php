<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ConfirmationReservation;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{

    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }
    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail',$reservation->email )
            ->notify(new ConfirmationReservation());
        Toastr::success('Reservation confirmée avec succès.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function destory($id){
        Reservation::find($id)->delete();
        Toastr::success('Reservation supprimée avec succès .','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
