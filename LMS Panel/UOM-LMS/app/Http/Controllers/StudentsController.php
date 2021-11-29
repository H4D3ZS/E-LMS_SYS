<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    // public function showRegisterForm()
    // {
    //     return view('lms/students/register');
    // }
    // public function register(Request $request)
    // {
    //     $data = $request->validate([
    //         'fullname'=>'required',
    //         'fname'=>'required',
    //         'address'=>'required',
    //         'phone'=>'required',
    //         'email'=>'required',
    //         'roll_no'=>'required',
    //         'cnic'=>'required',
    //         'semester'=>'required',
    //         'dept'=>'required',
    //         'username'=>'required',
    //         'password'=>'required',
    //         'confirm_password'=>'required',
    //     ]);
    //         Student::create([
    //             'fullname'=>$data['fullname'],
    //             'fname'=>$data['fname'],
    //             'address'=>$data['address'],
    //             'phone'=>$data['phone'],
    //             'email'=>$data['email'],
    //             'roll_no'=>$data['roll_no'],
    //             'cnic'=>$data['cnic'],
    //             'semester'=>$data['semester'],
    //             'dept'=>$data['dept'],
    //             'username'=>$data['username'],
    //             'password'=>bcrypt($data['password']),
    //             'confirm_password'=>bcrypt($data['confirm_password']),
    //         ]);
    //         Session::flash('success','Student Registered Successfully');
    //         return redirect()->back();
    // }
    // public function login(Request $request)
    // {
    //     $this->validateLogin($request);

    //     // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //     // the login attempts for this application. We'll key this by the username and
    //     // the IP address of the client making these requests into this application.
    //     if ($this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);

    //         return $this->sendLockoutResponse($request);
    //     }

    //     if ($this->attemptLogin($request)) {
    //         return $this->sendLoginResponse($request);
    //     }

    //     // If the login attempt was unsuccessful we will increment the number of attempts
    //     // to login and redirect the user back to the login form. Of course, when this
    //     // user surpasses their maximum number of attempts they will get locked out.
    //     $this->incrementLoginAttempts($request);

    //     return $this->sendFailedLoginResponse($request);
    // }
}
