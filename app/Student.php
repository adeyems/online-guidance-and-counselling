<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpFoundation\Request;

class Student extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'students';
    protected $primaryKey = 'student_no';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'name', 'surname', 'student_no', 'mobile_no', 'address', 'date_of_birth', 'class', 'password', 'class_teacher_name', 'class_teacher_surname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function login(Request $request) {

        return Student::where('student_no', $request->get('student_no'))->where('password', sha1($request->get('password')))->first();

    }

    public static function create(Request $request) {
        $student = new Student();

        $student->name = $request->name;
        $student->student_no = $request->student_no;
        $student->email = $request->email;
        $student->surname = $request->surname;
        $student->mobile_no = $request->mobile_no;
        $student->address = $request->address;
        $student->date_of_birth = $request->date_of_birth;
        $student->class = $request->class;
        $student->password = sha1($request->password);
        $student->class_teacher_name = explode(" ", $request->class_teacher_name)[0];
        $student->class_teacher_surname = explode(" ",  $request->class_teacher_name)[1];

       return $student->save();

    }

    public static function getByStudentNo(string $studentNo){
        return Student::where('student_no', $studentNo)->first();
    }

    public static function findByEmail(string $email){
        $user = self::where('email', $email)->first();
        if ($user) {
            $user->userType = 'student';
            return $user;
        }
        return null;
    }

    public static function getByEmail(string $email){
        $user = self::where('email', $email)->first();

        return $user;

    }

    public static function updatePassword($user, $password){
        $student = self::where('email', $user->email)->first();
        $student->password = sha1($password);

        return $student->save();
    }

    public static function findByStudentNo(string $no){
        return self::find($no);
    }

}
