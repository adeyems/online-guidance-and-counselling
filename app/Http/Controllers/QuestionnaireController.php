<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use App\Student;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    public function index(){
        return view('questionnaire');
    }

    public function create(Request $request){
        if (Questionnaire::create($request)) {
            return redirect('/questionnaire')->with('status', 'Your questionnaire was submitted successfully!');
        }
        else{
            return view('questionnaire')->with('error',  "Sorry, An error occurred while creating your questionnaire.");
        }
    }

    public function view(){
        $questionnaires = Questionnaire::getAll();
        foreach ($questionnaires as $questionnaire){
            $questionnaire["student"] = Student::getByStudentNo($questionnaire->student_no);
        }
        return view('completed_questionnaire', ['questionnaires' => $questionnaires]);
    }
}
