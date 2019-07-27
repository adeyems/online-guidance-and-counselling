<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
        $this->middleware('guest')->except('logout');
    }

    public function student()
    {
        return view('auth.login')->with('user', 'Student')->with('login', 'studentLogin');
    }

    public function parent()
    {
        return view('auth.login')->with('user', 'Parent')->with('login', 'parentLogin');
    }

    public function teacher()
    {
        return view('auth.login')->with('user', 'Teacher')->with('login', 'teacherLogin');
    }

    public function counsellor()
    {
        return view('auth.login')->with('user', 'Guidance and Counsellor')->with('login', 'counsellorLogin');
    }

    public function teacherLogin(Request $request)
    {
        $this->validateLogin('');
    }

    public function studentLogin(Request $request)
    {

    }

    public function parentLogin(Request $request)
    {

    }

    public function counsellorLogin(Request $request)
    {

    }
}
