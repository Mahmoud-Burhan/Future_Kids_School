<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MyParent;
use App\Http\Controllers\Calendar\FullCalendarController;

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

/*This is before using multi authentication */

/*Auth::routes();*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::get('/', 'HomeController@index')->name('selection');

    Route::group(['namespace' => 'Auth'], function () {

        Route::get('/login/{type}', 'LoginController@loginForm')->middleware('guest')->name('login.show');

        Route::post('/login', 'LoginController@login')->name('login');

        Route::get('/logout/{type}', 'LoginController@logout')->name('logout');

    });
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

    /*---------------Grades controller------------*/
    Route::group(['namespace' => 'Grade'], function () {
        Route::resource('Grade', 'GradeController');
    });
    /*----------------end-----------------------*/

    /*---------------Classroom controller------------*/
    Route::group(['namespace' => 'Classroom'], function () {
        Route::resource('Classroom', 'ClassroomController');
        Route::post('delete_checked', 'ClassroomController@delete_checked')->name('delete_checked');
        Route::post('filter_classroom', 'ClassroomController@filter_classroom')->name('filter_classroom');
    });
    /*----------------end-----------------------*/

    /*----------------Section Controller------------------------------*/
    Route::group(['namespace' => 'Section'], function () {
        Route::resource('Section', 'SectionController');
        Route::get('getClasses/{id}', 'SectionController@getClasses')->name('getClasses');
    });
    /*-----------------------end--------------------------------------*/

    /*----------------Parents Controller------------------------------*/

    Route::view('my-family', 'livewire.show_form');

    /*-----------------------end--------------------------------------*/

    /*-----------------------Teacher Controller--------------------------------------*/
    Route::group(['namespace' => 'Teacher'], function () {
        Route::resource('Teacher', 'TeacherController');
    });
    /*-----------------------------End------------------------------*/

    /*-----------------------Student Controller--------------------------------------*/
    Route::group(['namespace' => 'Student'], function () {
        Route::resource('Student', 'StudentController');
        Route::get('getClassroom/{id}', 'StudentController@getClassroom')->name('getClassroom');
        Route::get('getSection/{id}', 'StudentController@getSection')->name('getSection');
        Route::post('student_attachment', 'StudentController@student_attachment')->name('student_attachment');
        Route::get('attachment_download/{id}/{name}', 'StudentController@attachment_download')->name('attachment_download');
        Route::get('attachment_delete/{id}/{name}', 'StudentController@attachment_delete')->name('attachment_delete');
        Route::post('Graduate_Student', 'StudentController@Graduate_Student')->name('Graduate_Student');

    });
    /*-----------------------------End------------------------------*/

    /*-----------------------Student Promotion Controller--------------------------------------*/
    Route::group(['namespace' => 'StudentPromotion'], function () {
        Route::resource('StudentPromotion', 'StudentPromotionController');
        Route::get('getClassroom/{id}', 'StudentPromotionController@getClassroom')->name('getClassroom');
        Route::get('getSection/{id}', 'StudentPromotionController@getSection')->name('getSection');
        Route::get('getNewClassroom/{id}', 'StudentPromotionController@getNewClassroom')->name('getNewClassroom');
        Route::get('getNewSection/{id}', 'StudentPromotionController@getNewSection')->name('getNewSection');
    });
    /*-----------------------------End------------------------------*/

    /*-----------------------Student Graduate Controller--------------------------------------*/
    Route::group(['namespace' => 'StudentGraduate'], function () {
        Route::resource('StudentGraduate', 'StudentGraduateController');
        Route::post('getClassroom/{id}', 'StudentGraduateController@getClassroom')->name('getClassroom');
        Route::post('getSection/{id}', 'StudentGraduateController@getSection')->name('getSection');
        Route::post('graduateReturn}', 'StudentGraduateController@graduateReturn')->name('graduateReturn');
        Route::post('deleteGraduate}', 'StudentGraduateController@deleteGraduate')->name('deleteGraduate');
    });
    /*-----------------------------End------------------------------*/

    /*-----------------------Account Controller--------------------------------------*/
    Route::group(['namespace' => 'Fees'], function () {
        Route::resource('Fees', 'FeeController');
        Route::get('getClassroom/{id}', 'FeeController@getClassroom')->name('getClassroom');
    });

    Route::group(['namespace' => 'FeesInvoice'], function () {
        Route::resource('FeesInvoice', 'FeesInvoiceController');
        Route::get('getAmount/{id}', 'FeeController@getAmount')->name('getAmount');
    });

    Route::group(['namespace' => 'ReceiptStudent'], function () {
        Route::resource('ReceiptStudent', 'ReceiptStudentController');
    });

    Route::group(['namespace' => 'ProcessingFee'], function () {
        Route::resource('ProcessingFee', 'ProcessingFeeController');
    });

    Route::group(['namespace' => 'PaymentFee'], function () {
        Route::resource('PaymentFee', 'PaymentFeeController');
    });
    /*-----------------------------End------------------------------*/

    /*-----------------------Student Attendance Controller--------------------------------------*/
    Route::group(['namespace' => 'StudentAttendance'], function () {
        Route::resource('StudentAttendance', 'StudentAttendanceController');
    });
    /*-----------------------------End------------------------------*/

    /*----------------------- Subject Controller--------------------------------------*/
    Route::group(['namespace' => 'Subject'], function () {
        Route::resource('Subject', 'SubjectController');
        Route::get('getClasses/{id}', 'SubjectController@getClasses')->name('getClasses');
    });
    /*-----------------------------End------------------------------*/

    /*----------------------- Quiz Controller--------------------------------------*/
    Route::group(['namespace' => 'Quizzes'], function () {
        Route::resource('Quizzes', 'QuizController');
        Route::get('getClasses/{id}', 'QuizController@getClasses')->name('getClasses');
        Route::get('getSections/{id}', 'QuizController@getSections')->name('getSections');
    });
    /*-----------------------------End------------------------------*/

    /*----------------------- Questions Controller--------------------------------------*/
    Route::group(['namespace' => 'Question'], function () {
        Route::resource('Question', 'QuestionController');
    });
    /*-----------------------------End------------------------------*/

    /*----------------------- Online Classes Controller--------------------------------------*/
    Route::group(['namespace' => 'OnlineClasses'], function () {
        Route::resource('OnlineClasses', 'OnlineClassesController');
        Route::get('getClassroom/{id}', 'OnlineClassesController@getClassroom')->name('getClassroom');
        Route::get('getSections/{id}', 'OnlineClassesController@getSections')->name('getSections');
        Route::get('/Indirect', 'OnlineClassesController@indirectCreate')->name('Indirect.create');
        Route::post('/Indirect', 'OnlineClassesController@indirectStore')->name('Indirect.store');
    });
    /*-----------------------------End------------------------------*/

    /*----------------------- Library Controller--------------------------------------*/
    Route::group(['namespace' => 'Library'], function () {
        Route::resource('Library', 'LibraryController');
        Route::get('download_attachment/{id}/{file_name}', 'LibraryController@download_attachment')->name('download_attachment');
        Route::get('display_attachment/{id}/{file_name}', 'LibraryController@display_attachment')->name('display_attachment');
        Route::post('delete_all', 'LibraryController@delete_all')->name('delete_all');
    });
    /*-----------------------------End------------------------------*/

    /*----------------------- Setting Controller--------------------------------------*/
    Route::group(['namespace' => 'Setting'], function () {
        Route::resource('Setting', 'SettingController');
    });
    /*-----------------------------End------------------------------*/

}
);


