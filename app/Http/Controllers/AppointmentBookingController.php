<?php

namespace App\Http\Controllers;

use App\AppointmentBooking;
use Illuminate\Http\Request;

class AppointmentBookingController extends Controller
{
    public function index(){
        $role = session()->get('role')[0];

        if ($role == 'Teacher' || $role == 'Counsellor') {
            return redirect('/');
        }
        return view('appointment.booking',
            [ 'student_no' => session()->get('user')[0]['student_no'], "ref" => "BRN" . time()]);
    }

    public function create(Request $request){
        $role = strtolower(session()->get('role')[0]);

        if ($role == 'teacher' || $role == 'counsellor') {
            return redirect('/');
        }

        if (AppointmentBooking::create($request)) {
            return redirect("/home/$role")->with('status', 'Your appointment was booked successfully!');
        }
        else{
            return view('appointment.booking')->with('error',  "Sorry, An error occurred while booking your appointment.")
                ->with( 'student_no', session()->get('user')[0]['student_no'])
                ->with("ref", "BRN" . time());
        }
    }
}
