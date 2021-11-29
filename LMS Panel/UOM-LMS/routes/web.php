<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/home', 'HomeController@showAdminDashboard')->name('home');

Route::get('/', function () {
    // Session::flush();
    return view('welcome');
});

//admin routes which are not protected for demonstration purpose
Route::prefix('/admin')->group(function(){
        Auth::routes();
        Route::get('/dashboard','HomeController@showAdminDashboard')->name('admin.home');
        Route::post('/user/logout', 'Auth\LoginController@userlogout')->name('admin.logout');


        Route::get('/lessons','HomeController@showAllLessons')->name('admin.lesson.all');
        Route::get('/active/teachers','HomeController@showActiveTeachers')->name('admin.teacher.active.show');
        Route::get('/pending/teachers','HomeController@showPendingTeachers')->name('admin.teacher.pending.show');


        Route::post('/teacher/delete','HomeController@deleteTeacher')->name('admin.teacher.delete');
        Route::post('/teacher/approve','HomeController@approveTeacher')->name('admin.teacher.approve');
        Route::post('/teacher/un-approve','HomeController@unApproveTeacher')->name('admin.teacher.un-approve');



        Route::get('/file/download/{file}', 'HomeController@downloadFiles')->name('admin.file.download');
        Route::post('/file/{file}', 'HomeController@deleteFile')->name('admin.file.delete');

});

Route::prefix('/student')->group(function(){
        Route::get('/login','Auth\StudentsLoginController@showLoginForm')->name('student.login');
        Route::post('/login','Auth\StudentsLoginController@login')->name('student.login.submit');
        Route::get('/register','Auth\StudentsRegisterController@showRegisterForm')->name('student.register');
        Route::post('/register', 'Auth\StudentsRegisterController@register')->name('student.register.submit');
        Route::get('/home', 'StudentsHomeController@home')->name('student.home');
        Route::post('/logout', 'Auth\StudentsLoginController@logout')->name('student.logout');
        //these routes are going to teacher controller and display all the students
        Route::get('/all', 'TeachersHomeController@showAllStudents')->name('student.all.show');
        Route::get('/pending', 'TeachersHomeController@showPendingStudents')->name('student.pending.show');
        Route::post('/delete','TeachersHomeController@deleteStudent')->name('student.delete');
        Route::post('/pending/delete','TeachersHomeController@deletePendingStudent')->name('student.pending.delete');

        //Teacher approve the students from this route
        Route::post('/approve/mail', 'MailsController@studentApprove')->name('student.approve.mail');
        //Student Lesson routes
        Route::get('/lesson','StudentsHomeController@showLessonForm')->name('lesson');
        //download files
        //meeting route
        Route::get('/meeting/credentials','StudentsHomeController@meetingCredentials')->name('meeting.credentials');
        Route::get('/file/download/{file}', 'LessonsController@downloadFiles')->name('file.download');



});
Route::prefix('/teacher')->group(function(){
        Route::get('/login','Auth\TeachersLoginController@showLoginForm')->name('teacher.login');
        Route::post('/login','Auth\TeachersLoginController@login')->name('teacher.login.submit');
        Route::get('/home','TeachersHomeController@home')->name('teacher.home');
        Route::post('/logout', 'Auth\TeachersLoginController@logout')->name('teacher.logout');
        Route::get('/register', 'Auth\TeachersRegisterController@showRegisterForm')->name('teacher.register');
        Route::post('/register', 'Auth\TeachersRegisterController@Register')->name('teacher.register.submit');
        Route::get('/complete/profile', 'Auth\TeachersRegisterController@showCompleteProfileForm')->name('complete.profile');
        Route::post('/complete/profile', 'Auth\TeachersRegisterController@completeProfile')->name('complete.profile.submit');
});
//Teacher lesson routes
Route::prefix('/lesson')->group(function(){
        Route::get('/add', 'LessonsController@showLessonForm')->name('lesson.add');
        Route::post('/add', 'LessonsController@addLesson')->name('lesson.add.submit');
        Route::get('/all', 'LessonsController@showAllLessons')->name('lesson.all.show');
        // Route::get('/all/get', 'LessonsController@getLessons')->name('lesson.all.get');
        Route::post('/delete', 'LessonsController@deleteLesson')->name('lesson.delete');
        Route::get('/edit/{id}', 'LessonsController@showEditLessonForm')->name('lesson.edit');
        Route::post('/update', 'LessonsController@updateLesson')->name('lesson.update.submit');
});
