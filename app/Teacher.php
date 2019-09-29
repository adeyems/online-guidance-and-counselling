<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpFoundation\Request;

class Teacher extends Model {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'surname', 'mobile_no', 'address', 'position', 'password', 'level', 'email',
    ];

    public static function login(Request $request) {

        return Teacher::where('employment_no', $request->get('employment_no'))->where('password', sha1($request->get('password')))->first();

    }

    public static function getTeachersName() {
        return Teacher::select('name', 'surname')->get();
    }

    public static function findByEmail(string $email){
        $user = self::where('email', $email)->first();
        if ($user) {
            $user->userType = 'teacher';
            return $user;
        }

        return null;
    }

    public static function getByEmail(string $email){
        $user = self::where('email', $email)->first();

        return $user;

    }

    public static function updatePassword($user, $password){
        $teacher = self::where('email', $user->email)->first();
        $teacher->password = sha1($password);

        return $teacher->save();
    }
}
