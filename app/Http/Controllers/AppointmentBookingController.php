<?php

namespace App\Http\Controllers;

use App\AppointmentBooking;
use Illuminate\Http\Request;

class AppointmentBookingController extends Controller
{
    public function index(){
        return view('appointment_booking');
    }

    public function create(Request $request){
        if (AppointmentBooking::create($request)) {
            return redirect('/appointment/booking')->with('status', 'Your appointment was booked successfully!');
        }
        else{
            return view('appointment_booking')->with('error',  "Sorry, An error occurred while booking your appointment.");
        }
    }
}
