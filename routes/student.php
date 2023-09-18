<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth:student']
    ], function () {

    //==============================dashboard============================
    Route::get('/student/dashboard', function () {
        return view('pages.student.dashboard.dashboard');
    });

    Route::group(['namespace'=>'Student\Dashboard'],function ()
    {
        Route::resource('Student_Exams', 'StudentExamsController');
        Route::get('/StudentProfile','ProfileController@index')->name('profile.index');
        Route::post('/StudentProfile/{id}','ProfileController@update')->name('profile.update');
    });



});


