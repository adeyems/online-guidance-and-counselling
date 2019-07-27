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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Login Page Routes
Route::get('/login/parent', 'Auth\LoginController@parent')->name('login.parent');
Route::get('/login/student', 'Auth\LoginController@student')->name('login.student');
Route::get('/login/counsellor', 'Auth\LoginController@counsellor');
Route::get('/login/teacher', 'Auth\LoginController@teacher');

//Login Request Routes
Route::post('/login/studentLogin', 'Auth\LoginController@studentLogin')->name('studentLogin');
Route::post('/login/parentLogin', 'Auth\LoginController@parentLogin')->name('parentLogin');;
Route::post('/login/teacherLogin', 'Auth\LoginController@teacherLogin')->name('teacherLogin');;
Route::post('/login/counsellorLogin', 'Auth\LoginController@counsellorLogin')->name('counsellorLogin');;
