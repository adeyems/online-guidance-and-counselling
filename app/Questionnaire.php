<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpFoundation\Request;

class Questionnaire extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'students_questionnaire_forms';
    protected $primaryKey = 'questionnaire_form_reference_no';
    protected $fillable = [
        'student_no',  'appointment_reference_no', 'problem_description', 'start_date_of_noticed_problems'
    ];

    public function students(){
        return Student::class;
    }

    public static function create(Request $request)
    {
        $questionnaire = new Questionnaire();

        $questionnaire->student_no = $request->student_no;
        $questionnaire->appointment_reference_no = $request->appointment_reference;
        $questionnaire->problem_description = $request->problem_description;
        $questionnaire->start_date_of_noticed_problems = $request->start_date;

        return $questionnaire->save();

    }

    public static function getAll(){
       return Questionnaire::all();
    }

    public static function getById(int $id){
        return self::find($id);
    }

}
