<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class MailsController extends Controller
{
    public function studentApprove(Request $request)
    {
        $std_id = $request->std_id;
        $user = Student::findOrFail($std_id);
        Student::findOrFail($std_id)->update(['isVerified'=>1]);

        $user->notify(new \App\Notifications\StudentVerification());

        Session::flash('success','Request approved, A successfull email sent to the student');
        return redirect()->route('student.pending.show');
    }
}
