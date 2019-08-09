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

Route::get('/', 'HomeController@index');

Route::get('/home/student', 'HomeController@student');
Route::get('/home/parent', 'HomeController@parent');
Route::get('/home/teacher', 'HomeController@teacher');
Route::get('/home/counsellor', 'HomeController@counsellor');

//Login Page Routes
Route::get('/login/parent', 'Auth\LoginController@parent')->name('login.parent');
Route::get('/login/student', 'Auth\LoginController@student')->name('login.student');
Route::get('/login/counsellor', 'Auth\LoginController@counsellor');
Route::get('/login/teacher', 'Auth\LoginController@teacher');

//Login Request Routes
Route::post('/login/studentLogin', 'Auth\LoginController@studentLogin')->name('studentLogin');
Route::post('/login/parentLogin', 'Auth\LoginController@parentLogin')->name('parentLogin');;
Route::post('/login/teacherLogin', 'Auth\LoginController@teacherLogin')->name('teacherLogin');;
Route::post('/login/counsellorLogin', 'Auth\LoginController@counsellorLogin')->name('counsellorLogin');

//Register Page Routes
Route::get('/register/student', 'Auth\RegisterController@student')->name('studentRegister');
Route::get('/register/parent', 'Auth\RegisterController@studentParent')->name('parentRegister');


//Register Page Routes
Route::post('/register/createStudent', 'Auth\RegisterController@createStudent')->name('createStudent');
Route::post('/register/createParent', 'Auth\RegisterController@createParent')->name('createParent');

//Logout
Route::get('/logout', 'Auth\LogoutController@index')->name('logout');

Route::get('/password/email', 'Auth\ResetPasswordController@viewResetEmail')->name('reset-email');

Route::get('/password/reset', 'Auth\ResetPasswordController@viewResetPassword')->name('reset-password');

Route::post('/password/update', 'Auth\ResetPasswordController@UpdatePassword')->name('password.update');

Route::post('/password/reset', 'Auth\ResetPasswordController@sendResetEmail')->name('send-reset-email');

Route::get('/appointment/booking', 'AppointmentBookingController@index')->name('appointment.book');

Route::post('/appointment/create', 'AppointmentBookingController@create')->name('appointment.create');

Route::get('/questionnaire', 'QuestionnaireController@index')->name('questionnaire');

Route::post('/questionnaire/create', 'QuestionnaireController@create')->name('questionnaire.create');

Route::get('/questionnaire/view', 'QuestionnaireController@view')->name('questionnaire.view');

Route::get('/questionnaire/details/{id}', 'QuestionnaireController@details')->name('questionnaire.details');

Route::get('/caseform/new/{id}', 'CaseFormController@index')->name('caseform');

Route::post('/caseform/create', 'CaseFormController@create')->name('caseform.create');

Route::get('/caseform/view', 'CaseFormController@view')->name('caseform.view');

Route::get('/caseform/details/{id}', 'CaseFormController@details')->name('caseform.details');

Route::get('/caseform/update/{id}', 'CaseFormController@update')->name('caseform.update');

Route::post('/caseform/update}', 'CaseFormController@updateCase')->name('caseform.updateCase');

Route::get('/sms', 'SMSController@sendSMS');
