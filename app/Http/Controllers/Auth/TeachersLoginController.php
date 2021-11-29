<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Teacher;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TeachersLoginController extends Controller
{
    protected $table= 'teachers';
    protected $redirectTo = '/lms/teachers/home';


    public function __construct()
    {
        $this->middleware('guest:teacher')->except(['logout']);
    }
   public function showLoginForm()
   {
       return view('lms.teachers.login');
   }
   public function login(Request $request)
   {

       $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:6',
       ]);

       if(Auth::guard('teacher')->attempt(['email'=>$request->email, 'password'=>$request->password,'isVerified' => '1'], $request->remember))
       {
        $request->session()->flash('success', "Login successfully");
        $email = $request->email;
        $result = DB::table('teachers')->where('email', $email)->first();
        $teacher_id = $result->id;
        $dept = $result->dept;
        $semester = $result->teaching_semester;
        $request->session()->put('dept',$dept);
        $request->session()->put('semester',$semester);
        $request->session()->put('teacher_id',$teacher_id);
        return redirect()->intended(route('teacher.home'));
       }
       else if(Auth::guard('teacher')->attempt(['email'=>$request->email, 'password'=>$request->password,'isVerified' => '2'] ))
       {
        //    return "Else 2 is running";
           $request->session()->flash('info', "Please complete your profile first");
           $email = $request->email;
           $result = DB::table('teachers')->where('email', $email)->where('isVerified',2)->first();
        //    dd($result);
           $teacher_id = $result->id;
           $teacher_fullname = $result->fullname;
           $teacher_dept = $result->dept;
           $teacher_semester = $result->teaching_semester;
           Auth::guard('teacher')->logout();
           $request->session()->put('email',$email);
           $request->session()->put('teacher_id',$teacher_id);
           $request->session()->put('teacher_dept',$teacher_dept);
           $request->session()->put('teaching_semester',$teacher_semester);
           $request->session()->put('teacher_fullname',$teacher_fullname);

           return redirect()->route('complete.profile');
       }
       else{
        Session::flash('error', "Credentials don't matches");
        return redirect()->back();
       }








       // validating the user if user have too many attemps
       $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

   public function logout()
   {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
   }

}
