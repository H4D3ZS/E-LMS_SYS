<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exceptions\Handler;
use App\Lesson;
use App\Student;
use Illuminate\Support\Facades\DB;

class TeachersHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }
    public function home(Request $request)
    {
        $semester = $request->session()->get('semester');
        $teacher_id = $request->session()->get('teacher_id');
        $dept = $request->session()->get('dept');
        $total_lessons = DB::table('lessons')->where('teacher_id',$teacher_id)->count();
        $semester = str_replace(',', '', $semester);

        $semester = str_split($semester);
        if (isset($semester)) {

            if (isset($semester[0])) {
               $class1 = $semester[0]."</br>";
            }
            else{
                 $class1 =0;
            }
            if (isset($semester[1])) {
                 $class2 = $semester[1]."</br>";
            }
            else{
                 $class2 =0;
            }
             if (isset($semester[2])) {
                 $class3 = $semester[2]."</br>";
            }
            else{
                 $class3 =0;
            }
             if (isset($semester[3])) {
                 $class4 = $semester[3]."</br>";
            }
            else{
                 $class4 =0;
            }
            if (isset($semester[4])) {
                 $class5 = $semester[4]."</br>";
            }
            else{
                 $class5 =0;
            }
            if (isset($semester[5])) {
                 $class6 = $semester[5]."</br>";
            }
            else{
                 $class6 =0;
            }
            if (isset($semester[6])) {
                 $class7 = $semester[6]."</br>";
            }
            else{
                 $class7 =0;
            }
            if (isset($semester[7])) {
                 $class8 = $semester[7]."</br>";
            }
            else{
                 $class8 =0;
            }
        }
       $students = DB::table('students')->where('dept', '=', $dept)
       ->where('isVerified','=',1)
       ->whereIn('semester', [$class1,$class2,$class3,$class4,$class5,$class6,$class7,$class8])
       ->get();

       $pending_students = DB::table('students')->where('dept', '=', $dept)
       ->where('isVerified','=',0)
       ->whereIn('semester', [$class1,$class2,$class3,$class4,$class5,$class6,$class7,$class8])
       ->get();

        $total_students = $students->count();
        $pending_students = $pending_students->count();
        return view('lms.teachers.home', compact('total_students','pending_students','total_lessons'));
    }

    public function showAllStudents(Request $request)
    {
        $semester = $request->session()->get('semester');
        $dept = $request->session()->get('dept');
        $semester = str_replace(',', '', $semester);

        $semester = str_split($semester);
        if (isset($semester)) {

            if (isset($semester[0])) {
               $class1 = $semester[0]."</br>";
            }
            else{
                 $class1 =0;
            }
            if (isset($semester[1])) {
                 $class2 = $semester[1]."</br>";
            }
            else{
                 $class2 =0;
            }
             if (isset($semester[2])) {
                 $class3 = $semester[2]."</br>";
            }
            else{
                 $class3 =0;
            }
             if (isset($semester[3])) {
                 $class4 = $semester[3]."</br>";
            }
            else{
                 $class4 =0;
            }
            if (isset($semester[4])) {
                 $class5 = $semester[4]."</br>";
            }
            else{
                 $class5 =0;
            }
            if (isset($semester[5])) {
                 $class6 = $semester[5]."</br>";
            }
            else{
                 $class6 =0;
            }
            if (isset($semester[6])) {
                 $class7 = $semester[6]."</br>";
            }
            else{
                 $class7 =0;
            }
            if (isset($semester[7])) {
                 $class8 = $semester[7]."</br>";
            }
            else{
                 $class8 =0;
            }
        }
       $active_students = DB::table('students')->where('dept', '=', $dept)
       ->where('isVerified','=',1)
       ->whereIn('semester', [$class1,$class2,$class3,$class4,$class5,$class6,$class7,$class8])
       ->get();
       return view('lms.students.all-students', compact('active_students'));
    }
    public function showPendingStudents(Request $request)
    {
        $semester = $request->session()->get('semester');
        $dept = $request->session()->get('dept');
        $semester = str_replace(',', '', $semester);

        $semester = str_split($semester);
        if (isset($semester)) {

            if (isset($semester[0])) {
               $class1 = $semester[0]."</br>";
            }
            else{
                 $class1 =0;
            }
            if (isset($semester[1])) {
                 $class2 = $semester[1]."</br>";
            }
            else{
                 $class2 =0;
            }
             if (isset($semester[2])) {
                 $class3 = $semester[2]."</br>";
            }
            else{
                 $class3 =0;
            }
             if (isset($semester[3])) {
                 $class4 = $semester[3]."</br>";
            }
            else{
                 $class4 =0;
            }
            if (isset($semester[4])) {
                 $class5 = $semester[4]."</br>";
            }
            else{
                 $class5 =0;
            }
            if (isset($semester[5])) {
                 $class6 = $semester[5]."</br>";
            }
            else{
                 $class6 =0;
            }
            if (isset($semester[6])) {
                 $class7 = $semester[6]."</br>";
            }
            else{
                 $class7 =0;
            }
            if (isset($semester[7])) {
                 $class8 = $semester[7]."</br>";
            }
            else{
                 $class8 =0;
            }
        }
       $pending_students = DB::table('students')->where('dept', '=', $dept)
       ->where('isVerified','=',0)
       ->whereIn('semester', [$class1,$class2,$class3,$class4,$class5,$class6,$class7,$class8])
       ->get();
        return view('lms.students.pending-students', compact('pending_students'));
    }
    public function deleteStudent(Request $request)
    {
       $std_id = $request->std_id;
       Student::findOrFail($std_id)->delete();
       return redirect()->route('student.all.show');
    }
    public function deletePendingStudent(Request $request)
    {
       $std_id = $request->std_id;
       Student::findOrFail($std_id)->delete();
       return redirect()->route('student.pending.show');
    }




}
