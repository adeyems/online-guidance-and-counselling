<?php

namespace App\Http\Controllers;

use App\CaseForm;
use App\Questionnaire;
use App\Student;
use Illuminate\Http\Request;

class CaseFormController extends Controller
{
    public function index($id){
        $questionnaire = Questionnaire::getById($id);
        $questionnaire["student"] = Student::getByStudentNo($questionnaire["student_no"]);
        return view('case-form.create')->with("questionnaire", $questionnaire);
    }

    public function create(Request $request){
        $caseForm = CaseForm::create($request);
        if ($caseForm){
            return redirect(route('questionnaire.view'))->with('status', 'Case Created!');
        }
        else{
            return back()->with('error',  "Sorry, Your case could not be created.");
        }
    }

}
