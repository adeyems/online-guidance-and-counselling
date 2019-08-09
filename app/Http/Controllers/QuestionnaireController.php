<?php

namespace App\Http\Controllers;

use App\AppointmentBooking;
use App\Questionnaire;
use App\Student;
use Illuminate\Http\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;

class QuestionnaireController extends Controller
{
    public function index(){
        $role = session()->get('role')[0];

        if ($role == 'Teacher' || $role == 'Counsellor') {
            return redirect('/');
        }
        $bookings = AppointmentBooking::getByStudentNo(session()->get('user')[0]['student_no']);
        return view('questionnaire.create',
            [ 'student_no' => session()->get('user')[0]['student_no'], "ref" => "QE" . time(), "bookings" => $bookings ]);
    }

    public function create(Request $request){
        $role = strtolower(session()->get('role')[0]);

        if ($role == 'teacher' || $role == 'counsellor') {
            return redirect("/");
        }

        if (Questionnaire::create($request)) {
            try {
                SMSController::sendSMS(session()->get('user')[0]['mobile_no']);
            } catch (ConfigurationException $e) {
                dd($e->getMessage());
            } catch (TwilioException $e) {
                dd($e->getMessage());
            }
            return redirect("/home/$role")->with('status', 'Your questionnaire was submitted successfully!');
        }
        else{
            $bookings = AppointmentBooking::getByStudentNo(session()->get('user')[0]['student_no']);
            return view('questionnaire.create')->with('error',  "Sorry, An error occurred while creating your questionnaire.")
                ->with( 'student_no', session()->get('user')[0]['student_no'] )
                ->with("bookings,", $bookings)
                ->with("ref", "QE" . time());
        }
    }

    public function view(){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }

        $questionnaires = Questionnaire::getAll();
        foreach ($questionnaires as $questionnaire){
            $questionnaire["student"] = Student::getByStudentNo($questionnaire->student_no);
        }
        return view('questionnaire.view', ['questionnaires' => $questionnaires]);
    }

    public function details(int $id){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }

        $questionnaire = Questionnaire::getById($id);
        return view('questionnaire.details', ['questionnaire' => $questionnaire]);
    }
}
