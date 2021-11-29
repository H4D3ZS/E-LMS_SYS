<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class LessonsController extends Controller
{
    public function showLessonForm()
    {
        return view('lms.lessons.add-lesson');
    }
    public function addLesson(Request $request)
    {
        $teacher_id = $request->session()->get('teacher_id');

        $data = $this->validate($request,[
            'title'=>'bail|required|max:250',
            'description'=>'required|max:250',
            'semester'=>'required',
            'department'=>'required',
            'file'=>'required|max:2048|mimes:jpeg,bmp,png,doc,xlsx,pdf,docx,ppt,rar,zip',
        ]);
        if ($file = $request->file('file')){
            $name =  time().$file->getClientOriginalName();
            $file->move('UOM/lessons',$name);
            Lesson::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'semester'=>$request->semester,
                'department'=>$request->department,
                'file'=>$name,
                'video_link'=>$request->video_link,
                'teacher_id'=>$teacher_id,
            ]);
            return redirect()->route('lesson.all.show');
        }
        else{
            echo "Failed to upload the lesson! try again";
        }
    }
    public function showAllLessons(Request $request)
    {
        $teacher_id = $request->session()->get('teacher_id');
        $lessons = DB::table('lessons')->where('teacher_id',$teacher_id)->get();
        return view('lms.lessons.all-lesson', compact('lessons'));
    }
    public function showEditLessonForm($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lms.lessons.edit-lesson', compact('lesson'));
    }
    public function updateLesson(Request $request)
    {   $lesson_id = $request->lesson_id;
        $teacher_id = request()->session()->get('teacher_id');
        $data = $this->validate(request(),[
            'title'=>'bail|required|max:250',
            'description'=>'required|max:250',
            'semester'=>'required',
            'department'=>'required',
            // 'file'=>'required|max:2048|mimes:jpeg,bmp,png,doc,xlsx,pdf,docx,ppt,rar,zip',
        ]);
        if ($file = $request->file('file')){
            $name =  time().$file->getClientOriginalName();
            $file->move('UOM/lessons',$name);
            Lesson::findOrFail($lesson_id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'semester'=>$request->semester,
                'department'=>$request->department,
                'video_link'=>$request->video_link,
                'file'=>$name,
            ]);
            return redirect()->route('lesson.all.show');
         }
         else{
            Lesson::findOrFail($lesson_id)->update([
                'title'=>$request->title,
                'description'=>$request->description,
                'semester'=>$request->semester,
                'department'=>$request->department,
                'video_link'=>$request->video_link,
            ]);
            return redirect()->route('lesson.all.show');
         }
      }
        public function deleteLesson(Request $request)
        {
            $lesson_id = $request->lesson_id;
            Lesson::findOrFail($lesson_id)->delete();
            return redirect()->route('lesson.all.show');
        }
        public function downloadFiles($file)
        {
            $file = public_path()."/uom/lessons/".$file;
            $name = basename($file);
            return response()->download($file, $name);
        }
}

