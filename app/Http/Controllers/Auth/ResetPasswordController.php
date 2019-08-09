<?php

namespace App\Http\Controllers\Auth;

use App\Counsellor;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\PasswordReset;
use App\Student;
use App\StudentParent;
use App\Teacher;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Mockery\Generator\StringManipulation\Pass\Pass;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function viewResetPassword()
    {
        return view('auth.passwords.reset');
    }

    public function viewResetEmail(){
        return view('auth.passwords.email');
    }


    public function sendResetEmail(Request $request){
        $user = Student::findByEmail($request->email) ?? StudentParent::findByEmail($request->email) ?? Teacher::findByEmail($request->email)
            ?? Counsellor::findByEmail($request->email);

       if ($user){
           $url = 'https://' . $_SERVER['HTTP_HOST'] . '/password/reset/' . PasswordReset::create($user);

           $text = "Copy and paster this lijk to reset your password. $url";
           $html = "<p>Click <a href=\"$url\">here</a> to reset your password</p>";


           MailController::send($user->email, 'Password Reset', $text, $html);

           return back()->with('success', 'A reset link has been sent to your email address');
       }
        return back()->with('fail', 'Sorry, We could not find a user with this email');

    }
}
