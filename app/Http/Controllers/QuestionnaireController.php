<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Student;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index(){
        $role = session()->get('role')[0];

        if ($role == 'Teacher' || $role == 'Counsellor') {
            return redirect('/');
        }

        return view('questionnaire.create', [ 'student_no' => session()->get('user')[0]['student_no'] ]);
    }

    public function create(Request $request){
        $role = strtolower(session()->get('role')[0]);

        if ($role == 'teacher' || $role == 'counsellor') {
            return redirect("/");
        }

        if (Questionnaire::create($request)) {
            return redirect("/home/$role")->with('status', 'Your questionnaire was submitted successfully!');
        }
        else{
            return view('questionnaire.create')->with('error',  "Sorry, An error occurred while creating your questionnaire.")
                ->with([ 'student_no', session()->get('user')[0]['student_no'] ]);
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
