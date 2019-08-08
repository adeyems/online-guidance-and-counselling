<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
 use Illuminate\Notifications\Notifiable;

class CaseForm extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'students_case_forms';
    protected $primaryKey = 'case_reference_no';

    protected $fillable = [
        'student_no', "appointment_bookings_reference_no", "questionnaire_reference_no", "employment_no", "case_details"
    ];

    public static function create(Request $request){
        $caseform =  new CaseForm();

        $caseform->student_no = $request->student_no;
        $caseform->appointment_bookings_reference_no = $request->appointment_bookings_reference_no;
        $caseform->questionnaire_reference_no = $request->questionnaire_reference_no;
        $caseform->employment_no = $request->employment_no;
        $caseform->case_details = $request->case_details;

        return $caseform->save();
    }

}
