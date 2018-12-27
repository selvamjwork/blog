<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/get-subsect/{id}/{selectedSubsect?}','ProfileController@selectSubsect');
Route::get('/status','SmsStatusController@status');
Route::group(['middleware' => ['auth','verified','isMobileVerified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    #VerificationController Route
    Route::get('/mobileVerification', 'VerificationController@VerifyMobile');
    Route::patch('/resend-code', 'VerificationController@resendCode');
    Route::patch('/verify-code', 'VerificationController@verifyCode');
    #Profile Create Route
    Route::get('/personal1', 'ProfileController@personal1');
    Route::patch('/personal1', 'ProfileController@personalStore1');
    Route::get('/personal2', 'ProfileController@personal2');
    Route::patch('/personal2', 'ProfileController@personalStore2');
});
