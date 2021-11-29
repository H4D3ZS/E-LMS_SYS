<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        return view('lms/teachers/login');
    }
    public function login(Request $request)
    {
        $data = $request->validate([
            'username'=>'required',
            'password'=>'required',
         ]);
    }
    public function register()
    {
        return view('lms/teachers/register');
    }
    public function home()
    {
        return view('lms/teachers/home');
    }

    public function Quiz()
    {
        return view('lms/teachers/Quiz');
    }
    


    public function test()
    {
        echo "running the test";
    }
}
