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

    public function updatePassword(Request $request){
        $user = session()->get('userObj')[0];
        if ($this->getUserType($user->userType)->updatePassword($user, $request->password)) {
            return redirect("/login/$user->userType")->with('status', "Password Changed Successfully. You can now log in to your account");
        }

        return back()->with('fail', 'Sorry, An error occurred.');
    }


    public function sendResetEmail(Request $request){
        $user = Student::findByEmail($request->email) ?? StudentParent::findByEmail($request->email) ?? Teacher::findByEmail($request->email)
            ?? Counsellor::findByEmail($request->email);

       if ($user){
           $home = 'http://' . $_SERVER['HTTP_HOST'];
           $url =  $home . '/reset/' . PasswordReset::create($user);

           if (MailController::sendReset($user->email, $home, $url)){
               return back()->with('status', 'A reset link has been sent to your email address');
           }
           else{
               return back()->with('fail', 'Sorry, An error occurred.');

           }
       }
        return back()->with('fail', 'Sorry, We could not find a user with this email');

    }

    public function resetPassword(string $token)
    {
        $user = PasswordReset::findByToken($token);
        if (!$user){
            return redirect('/password/email')->with('fail', "This link has expired or is invalid.");
        }
        session()->push('userObj', $user);

        return redirect()->route('reset-password');


    }

    private function getUserType(string $userType) {
        switch ($userType) {
            case 'student':
                return new Student();
            case 'parent':
                return new StudentParent();
            case 'counsellor':
                return new Counsellor;
            case 'teacher':
                return new Teacher;
        }
    }
}
