<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Lesson;
use App\Teacher;
use Illuminate\Support\Facades\DB;

class StudentsHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    public function home()
    {
        return view('lms.students.home');
    }
    public function showLessonForm(Request $request)
    {
        $dept = $request->session()->get('dept');
        $semester = $request->session()->get('semester');
        $lessons = Lesson::where('department', '=', $dept)
        ->where('semester','=',$semester)->with('teacher')->get();

        return view('lms.students.lesson', compact('lessons'));
    }
    public function meetingCredentials()
    {
        return view('lms.students.meeting-credential');
    }
}
