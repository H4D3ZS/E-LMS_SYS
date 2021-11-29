<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizMaker extends Controller
{
    public function quiz_maker()
    {
        return view("LMS.Teachers.quiz");
       
       


    }
}
