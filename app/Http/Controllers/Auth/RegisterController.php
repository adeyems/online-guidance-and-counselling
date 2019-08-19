<?php

namespace App\Http\Controllers\Auth;

use App\Counsellor;
use App\Http\Controllers\MailController;
use App\Student;
use App\StudentParent;
use App\Teacher;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function student() {

        $teachersNames = Teacher::getTeachersName();

        return view('auth.register.student')->with('teachersNames', $teachersNames);
    }

    public function studentParent() {
        return view('auth.register.parent');
    }

    public function createStudent(Request $request) {


         $user = Student::create($request);
        $errors = [];

        if (substr($request->student_no, 0, 5) != "QE200" || strlen($request->student_no) != 9){
            $errors["s"] = "The Student Number should be in the format - QE200 and four other numbers";
}

        if (substr($request->mobile_no,0,4) != "+353" || strlen($request->mobile_no != 13)){
            $errors["c"] = "Mobile Number should start with +353 and 9 other integer characters";
        }

        $emailType = explode("@", $request->email)[1];

        if ($emailType != "gmail.com" && $emailType != "yahoo.com" && $emailType != "outlook.com" && $emailType != "hotmail.co.uk"){
            $errors["d"] = "Emails accepted are gmail.com, yahoo.com, outlook.com and hotmail.co.uk";
        }

        if (StudentParent::getByEmail($request->email)  || Student::getByEmail($request->email) || Teacher::getByEmail($request->email) || Counsellor::getByEmail($request->email)){
            $errors["e"] = "An account is associated with this email address";
        }

        $uppercase = preg_match('@[A-Z]@', $request->password);
        $lowercase = preg_match('@[a-z]@', $request->password);
        $number    = preg_match('@[0-9]@', $request->password);

        if(!$uppercase || !$lowercase || !$number || strlen($request->password) < 8) {
            $errors["f"] = "Password should contain at least an uppercase letter, a lower case letter and a minimum length of 8";
        }

        if ($request->password != $request->password_confirmation){
            $errors["g"] = "Password and Confirm Password do not match";
        }

        if (!empty($errors)) {
            return back()->with('error', $errors);
        }

        $user = Student::create($request);
        if ($user) {
            $home = 'http://' . $_SERVER['HTTP_HOST'];
            $url =  $home . '/verify/' . $user->verification_token;
            MailController::sendVerifyMail($user->email, $home, $url);
            $request->session()->flash('status', 'Your account was created successfully!');
            return redirect('/login/parent');
        }

        else{
            return view('auth.register.student')->with('error',  "Sorry, An error occurred")->with('old', $request);
        }
    }

    public function createParent(Request $request) {
        $errors = [];
        if (!Student::findByStudentNo($request->student_no)){
            $errors["a"] = "No student found with the student $request->student_no";
        }

        if (StudentParent::findByStudentNo($request->student_no)){
            $errors["b"] = "A parent is associated with this student $request->student_no";
        }

        if (substr($request->mobile_no,1,4) != "+353"){
            $errors["c"] = "Mobile Number should start with +353 and 9 other integer characters";
        }

        $emailType = explode("@", $request->email)[1];

        if ($emailType != "gmail.com" && $emailType != "yahoo.com" && $emailType != "outlook.com" && $emailType != "hotmail.co.uk"){
            $errors["d"] = "Emails accepted are gmail.com, yahoo.com, outlook.com and hotmail.co.uk";
        }

        if (StudentParent::getByEmail($request->email)  || Student::getByEmail($request->email)){
            $errors["e"] = "An account is associated with this email address";
        }

        $uppercase = preg_match('@[A-Z]@', $request->password);
        $lowercase = preg_match('@[a-z]@', $request->password);
        $number    = preg_match('@[0-9]@', $request->password);

        if(!$uppercase || !$lowercase || !$number || strlen($request->password) < 8) {
            $errors["f"] = "Password should contain at least an uppercase letter, a lower case letter and a minimum length of 8";
        }

        if ($request->password != $request->password_confirmation){
            $errors["g"] = "Password and Confirm Password do not match";
        }

        if (!empty($errors)) {
            return back()->with('error', $errors);
        }

        $user = StudentParent::create($request);
        if ($user) {
            $home = 'http://' . $_SERVER['HTTP_HOST'];
            $url =  $home . '/verify/' . $user->verification_token;
            MailController::sendVerifyMail($user->email, $home, $url);
            $request->session()->flash('status', 'Your account was created successfully!');
            return redirect('/login/parent');
        }

        else{
            return view('auth.register.parent')->with('error',  "Sorry, An error occurred")->with('old', $request);
        }
    }
}