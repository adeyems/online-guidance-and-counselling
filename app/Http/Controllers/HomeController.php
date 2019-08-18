<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        //$this->middleware('auth');

    }

    public function index()
    {
        if (session()->has('user')){
            $user = strtolower(session()->get('role')[0]);

            return redirect("/home/$user");
        }

        return view('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function student()
    {
        if (session()->get('role')[0] != 'Student') {
            return redirect('/');
        }

        return view('home.student');
    }

    public function parent()
    {
        if (session()->get('role')[0] != 'Parent') {
            return redirect('/');
        }

        return view('home.parent');
    }

    public function teacher()
    {
        if (session()->get('role')[0] != 'Teacher') {
            return redirect('/');
        }

        return view('home.teacher');
    }

    public function counsellor()
    {
        if (session()->get('role')[0] != 'Counsellor') {
            return redirect('');
        }

        return view('home.counsellor');
    }

    public function about() {
        return view('about');
    }

}
