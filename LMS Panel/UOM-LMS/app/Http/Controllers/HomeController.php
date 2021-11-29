<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showAdminDashboard()
    {
        $lessons = Lesson::all()->count();
        $teachers = Teacher::all()->take(10);
        $active_teachers = Teacher::where('isVerified',2)->orwhere('isVerified',1)->count();
        $pending_teachers = Teacher::where('isVerified',0);
        $students = Student::where('isVerified',1)->count();
        return view('lms.admin.dashboard', compact('lessons','teachers','active_teachers','pending_teachers','students'));
    }

    public function showAllLessons()
    {
        $lessons = Lesson::all();
        return view('lms.admin.lesson',compact('lessons'));
    }
    public function downloadFiles($file)
        {
            $file = public_path()."/uom/lessons/".$file;
            $name = basename($file);
            return response()->download($file, $name);
        }
    public function deleteFile(Request $request)
    {
        $lesson_id = $request->lesson_id;
        Lesson::findOrFail($lesson_id)->delete();
        return redirect()->route('lesson.all.show');
    }
    public function showActiveTeachers()
    {
        $active_teachers = Teacher::where('isVerified',1)->get();
        return view('lms.admin.active',compact('active_teachers'));
    }
    public function showPendingTeachers()
    {
        $pending_teachers = Teacher::where('isVerified',0)->latest()->get();
        return view('lms.admin.pending',compact('pending_teachers'));
    }
    public function deleteTeacher(Request $request)
    {
        $teach_id = $request->teacher_id;
        $id = Teacher::findOrFail($teach_id)->first(['isVerified']);
        $teacher_id =$id->isVerified;
        if($teacher_id==1)
        {
            Teacher::findOrFail($teach_id)->delete();
            return redirect()->route('admin.teacher.active.show');
        }else{
            Teacher::findOrFail($teach_id)->delete();
            return redirect()->route('admin.teacher.pending.show');
        }
    }
    public function approveTeacher(Request $request)
    {
        $teacher_id = $request->teacher_id;
        Teacher::findOrFail($teacher_id)->update(['isVerified'=>2]);
        return redirect()->route('admin.teacher.pending.show');
    }
    public function unApproveTeacher(Request $request)
    {
        Teacher::findOrFail($request->teacher_id)->delete();
        return redirect()->route('admin.teacher.pending.show');
    }
}
