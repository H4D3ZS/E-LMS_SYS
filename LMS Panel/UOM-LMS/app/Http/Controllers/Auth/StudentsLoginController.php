<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentsLoginController extends Controller
{
    protected $redirectTo = '/lms/students/home';

    public function __construct()
    {
        $this->middleware('guest:student')->except(['logout']);
    }
   public function showLoginForm()
   {
       return view('lms.students.login');
   }
   public function login(Request $request)
   {
       $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6',
       ]);
       if(Auth::guard('student')->attempt(['email'=>$request->email, 'password'=>$request->password,'isVerified' => '1'], $request->remember))
       {
        $request->session()->flash('success', "Login Successfully");
        $email = $request->email;
        $result = DB::table('students')->where('email', $email)->first();
        $dept = $result->dept;
        $semester = $result->semester;
        $request->session()->put('dept',$dept);
        $request->session()->put('semester',$semester);

        return redirect()->intended(route('student.home'));
       }
      else{
        Session::flash('error', "Credentials do not matches");
        return redirect()->back()->withInput();
      }

       // validating the user if user have too many attemps

    }

   public function logout()
   {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
   }
}
