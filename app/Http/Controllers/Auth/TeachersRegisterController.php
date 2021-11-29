<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Teacher;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TeachersRegisterController extends Controller
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
    protected $redirectTo = '/teacher/register';

    public function __construct()
    {
        // $this->middleware('guest');
    }

    public function showRegisterForm()
    {
       return view('lms.teachers.register');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['Bail','required', 'string', 'email', 'max:255', 'unique:students'],
            'fullname'=>['required','string'],
            'department'=>['required','string'],
            'teaching_semester'=>['required', 'array'],
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
        return Teacher::create([

            'email' => $data['email'],
            'fullname' => $data['fullname'],
            'teaching_semester' => implode(',', $data['teaching_semester']),
            'dept' => $data['department'],
            'password' => Hash::make($data['password']),
        ]);


    }
    public function showCompleteProfileForm(Request $request)
    {
        if($request->session()->get('email'))
        {
        $teacher_id = $request->session()->get('teacher_id');
        $teacher = DB::table('teachers')->select("id","fullname","email","dept","teaching_semester")->first();
        return view('lms.teachers.complete-profile', compact('teacher'));
        }
        else{
            return redirect()->route('teacher.login');
        }
    }
    public function completeProfile(Request $request)
    {   $teacher_id = $request->teacher_id;
        $this->validate($request,[
            'checkbox'=>'required',
            'address'=>'bail|required',
            'phone'=>'required|digits:11 ',
            'rank'=>'required',
            'salary'=>'required|integer',

        ]);
        $terms = $request->input('checkbox');
        if($terms=="on")
        {
            Teacher::findOrFail($teacher_id)->update([
                'address'=>$request->address,
                'phone'=>$request->phone,
                'salary'=>$request->salary,
                'rank'=>$request->rank,
                'isVerified'=>1,
            ]);
            Session::flash('success', 'Profile Updated');
            return redirect()->route('teacher.login');
        }
        else{
            echo "<p style='color:red'>Please Accept Terms and conditons, If you want to proceed</p>";
        }
    }
}
