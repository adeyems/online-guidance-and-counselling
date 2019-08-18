<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\HttpFoundation\Request;

class Counsellor extends Model
{
    use Notifiable;

    protected $table = 'guidance_counsellors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


    protected $fillable = [
        'name', 'surname', 'mobile_no', 'address', 'position', 'password', 'email',
    ];

    public static function login(Request $request) {

        return Counsellor::where('employment_no', $request->get('employment_no'))->where('password', sha1($request->get('password')))->first();

    }

    public static function findByEmail(string $email){
        $user = self::where('email', $email)->first();
        if ($user) {
            $user->userType = 'counsellor';
            return $user;
        }

        return null;
    }

    public static function getByEmail(string $email){
        $user = self::where('email', $email)->first();

        return $user;

    }

    public static function updatePassword($user, $password){
        $counsellor = self::where('email', $user->email)->first();
        $counsellor->password = sha1($password);

        return $counsellor->save();
    }

}
