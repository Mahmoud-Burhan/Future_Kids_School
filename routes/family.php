<?php

use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
/*
|--------------------------------------------------------------------------
|  Routes Student
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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:family']
    ], function () {

    //==============================dashboard============================
    Route::get('/family/dashboard', function () {
        $sons = Student::where('family_id',auth()->user()->id)->get();
        $info = Images::where('imageable_id',auth()->user()->id)->first();
        $data['folder_name'] = pathinfo($info->file_name,PATHINFO_FILENAME);
        $data['information'] = Student::where('id',auth()->user()->id)->first();
        return view('pages.families.dashboard.dashboard',$data,compact('sons','info'));
    })->name('dashboard.parents');

    Route::group(['namespace' => 'Families\dashboard'], function () {
        Route::get('children', 'ChildrenController@index')->name('sons.index');
        Route::get('results/{id}', 'ChildrenController@results')->name('sons.results');
        Route::get('attendances', 'ChildrenController@attendances')->name('sons.attendances');
        Route::post('attendances','ChildrenController@attendanceSearch')->name('sons.attendance.search');
        Route::get('fees', 'ChildrenController@fees')->name('sons.fees');
        Route::get('receipt/{id}', 'ChildrenController@receiptStudent')->name('sons.receipt');
    });



});


