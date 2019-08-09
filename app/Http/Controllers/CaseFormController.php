<?php

namespace App\Http\Controllers;

use App\CaseForm;
use App\Questionnaire;
use App\Student;
use Illuminate\Http\Request;

class CaseFormController extends Controller
{
    public function index($id){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }
        $questionnaire = Questionnaire::getById($id);
        $questionnaire["student"] = Student::getByStudentNo($questionnaire["student_no"]);

        return view('case-form.create')->with("questionnaire", $questionnaire)->with('ref', "CASE" . time());
    }

    public function create(Request $request){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }
        $caseForm = CaseForm::create($request);
        if ($caseForm){
            return redirect(route('caseform.view'))->with('status', 'Case Created!');
        }
        else{
            return back()->with('error',  "Sorry, Your case could not be created.");
        }
    }

    public function view(){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }

        $caseForms = CaseForm::getAll();
        foreach ($caseForms as $caseForm){
            $caseForm["student"] = Student::getByStudentNo($caseForm->student_no);
        }
        return view('case-form.view', ['caseForms' => $caseForms]);
    }

    public function details(int $id){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }

        $caseForm = CaseForm::getById($id);
        return view('case-form.details', ['caseForm' => $caseForm]);
    }

    public function update(int $id){
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }
        $caseForm = CaseForm::getById($id);
        $caseForm["student"] = Student::getByStudentNo($caseForm["student_no"]);

        return view('case-form.update')->with("caseForm", $caseForm)->with('ref', "CASE" . time());

    }

    public function updateCase(Request $request) {
        $role = session()->get('role')[0];

        if ($role == 'Student' || $role == 'Parent') {
            return redirect('/');
        }
        $caseForm = CaseForm::updateCase($request);
        if ($caseForm){
            return redirect(route('caseform.view'))->with('status', 'Case Updated!');
        }
        else{
            return back()->with('error',  "Sorry, Your case could not be updated.");
        }
    }

}
