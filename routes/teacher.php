<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ٍفعيثىف Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:teacher']
    ], function () {

    //==============================dashboard============================
    Route::get('/teacher/dashboard', function ()
    {
        $section_ids = \App\Models\Teacher::findorfail(auth()->user()->id)->Sections()->pluck('section_id');
        $data['students'] = \App\Models\Student::whereIn('section_id',$section_ids)->get();

        return view('pages.teachers.dashboard.dashboard',$data,compact('section_ids'));
    });

    //==============================teacher-students dashboard details============================
    Route::group(['namespace'=>'Teacher\Dashboard'],function ()
    {
        Route::get('student','StudentController@index')->name('student.index');
        Route::get('sections','StudentController@sections')->name('sections.index');
        Route::get('student_attendance/{grade_id}/{classroom_id}/{section_id}','StudentController@student_attendance')->name('student_attendance');
        Route::post('store_attendance','StudentController@store_attendance')->name('store_attendance');
        Route::get('attendance_report','StudentController@attendance_report')->name('attendance_report.index');
        Route::post('attendance.search','StudentController@attendanceSearch')->name('attendance.search');
        Route::get('getTeacherSections/{id}', 'StudentController@getTeacherSections')->name('getTeacherSections');
        Route::resource('teacherQuiz', 'TeacherQuizController');
        Route::get('getTeacherClasses/{id}', 'TeacherQuizController@getTeacherClasses')->name('getTeacherClasses');
        Route::get('getTeacherSection/{id}', 'TeacherQuizController@getTeacherSection')->name('getTeacherSection');
        Route::resource('teacherQuestion', 'TeacherQuestionController');
        Route::resource('TeacherOnlineClasses', 'TeacherOnlineClassesController');
        Route::get('/teacherIndirect', 'TeacherOnlineClassesController@teacherIndirectCreate')->name('teacherIndirect.create');
        Route::post('/teacherIndirect', 'TeacherOnlineClassesController@teacherIndirectStore')->name('teacherIndirect.store');
        Route::get('/teacherProfile','TeacherSettingController@index')->name('setting.index');
        Route::post('/teacherProfile/{id}','TeacherSettingController@update')->name('setting.update');
        Route::get('student_quizzes/{id}','TeacherQuizController@student_quizzes')->name('student.quizzes');
        Route::post('repeat_quizzes', 'TeacherQuizController@repeat_quizzes')->name('repeat.quizzes');
    });

});


