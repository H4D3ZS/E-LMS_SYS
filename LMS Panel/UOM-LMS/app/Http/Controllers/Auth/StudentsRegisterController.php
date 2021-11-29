<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Student;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class StudentsRegisterController extends Controller
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
    protected $redirectTo = '/student/register';

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/lms/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showRegisterForm(Request $request)
    {
        // return "session is no more exists"
        return view('lms.students.register');
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
            'fullname' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'address'=>['required','string'],
            'phone'=>['required','digits:11'],
            'cnic'=>['required','digits:13'],
            'roll_no'=>['required','min:7'],
            'semester'=>['required','digits:1'],
            'dept'=>['required','string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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
        Session::flash('success', "Registered Successfully");
        return Student::create([
            'fullname' => $data['fullname'],
            'fname' => $data['fname'],
            'email' => $data['email'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'cnic' => $data['cnic'],
            'roll_no' => $data['roll_no'],
            'semester' => $data['semester'],
            'dept' => $data['dept'],
            'password' => Hash::make($data['password']),
        ]);

    }

}
