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
}
