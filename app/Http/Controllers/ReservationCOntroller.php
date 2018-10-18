<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationCOntroller extends Controller
{
    public function reserve(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'dateandtime'=>'required',
        ]);

        $reservation=new Reservation();
        $reservation->name=$request->name;
        $reservation->phone=$request->phone;
        $reservation->email=$request->email;
        $reservation->date_and_time=$request->dateandtime;
        $reservation->massage=$request->message;
        $reservation->status=false;
        $reservation->save();
        return redirect()->back()->with('successMsg','Contact Message send Successfully !');

        /*Toastr::success('Reservation Request send Successfully.
        we will confirm to you shortly','success',["positionClass" => "toast-top-center"]);
        return redirect()->back();*/
    }
}
