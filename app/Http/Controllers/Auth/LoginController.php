<?php

namespace App\Http\Controllers\Auth;

use App\Counsellor;
use App\Http\Controllers\Controller;
use App\Student;
use App\StudentParent;
use App\Teacher;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        //$this->middleware('guest')->except('logout');

        if (session()->has('user')){
            redirect("/home/");
        }
    }

    public function student()
    {
        if (session()->has('user')){
            $url = strtolower(session()->get('role')[0]);

            return redirect("/home/$url");
        }

        return view('auth.login')->with('user', 'Student')->with('login', 'studentLogin')->with('register', 'studentRegister');
    }

    public function parent()
    {
        if (session()->has('user')){
            $url = strtolower(session()->get('role')[0]);

            return redirect("/home/$url");
        }

        return view('auth.login')->with('user', 'Parent')->with('login', 'parentLogin')->with('register', 'parentRegister');
    }

    public function teacher()
    {
        if (session()->has('user')){
            $url = strtolower(session()->get('role')[0]);

            return redirect("/home/$url");
        }

        return view('auth.login')->with('user', 'Teacher')->with('login', 'teacherLogin');
    }

    public function counsellor()
    {
        if (session()->has('user')){
            $url = strtolower(session()->get('role')[0]);

            return redirect("/home/$url");
        }

        return view('auth.login')->with('user', 'Guidance and Counsellor')->with('login', 'counsellorLogin');
    }

    public function teacherLogin(Request $request)
    {
        $teacher = Teacher::login($request);

        if ($teacher){
            session()->push('user', $teacher);
            session()->push('role', 'Teacher');
            return redirect('/home/teacher')->with('status', "Welcome $teacher->name  $teacher->surname");

        }

        return view('auth.login', ['error' => 'Login unsuccessful. Check your login credential', 'user' => 'Teacher', 'login' => 'teacherLogin', 'register' => 'teacherRegister']);
    }

    public function studentLogin(Request $request)
    {
        $student = Student::login($request);

        if ($student){
            session()->push('user', $student);
            session()->push('role', 'Student');
            return redirect('/home/student')->with('status', "Welcome $student->name  $student->surname");

        }

        return view('auth.login', ['error' => 'Login unsuccessful. Check your login credential', 'user' => 'Student', 'login' => 'studentLogin', 'register' => 'studentRegister']);

    }

    public function parentLogin(Request $request)
    {
        $parent = StudentParent::login($request);

        if ($parent){
            session()->push('user', $parent);
            session()->push('role', 'Parent');
            return redirect('/home/parent')->with('status', "Welcome $parent->name  $parent->surname");
        }

        return view('auth.login', ['error' => 'Login unsuccessful. Check your login credential', 'user' => 'Parent', 'login' => 'parentLogin', 'register' => 'parentRegister']);

    }

    public function counsellorLogin(Request $request)
    {
        $counsellor = Counsellor::login($request);

        if ($counsellor){
            session()->push('user', $counsellor);
            session()->push('role', 'Counsellor');
            return redirect('/home/counsellor')->with('status', "Welcome $counsellor->name  $counsellor->surname");
        }

        return view('auth.login', ['error' => 'Login unsuccessful. Check your login credential', 'user' => 'Counsellor', 'login' => 'counsellorLogin', 'register' => 'counsellorRegister']);


    }

    protected function logOut()
    {
        Auth::logout();
        request()->session()->flush();
        redirect('/')->with('status', "You are now logged out.");
    }
}
