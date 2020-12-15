<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', function () {
    return view('admin/login');
});

Route::get('/index', function () {
    return view('admin/index');
});

Route::get('/admin/viewUsers', function () {
    return view('admin/viewUsers');
});

Route::get('/admin/createUser', function () {
    return view('admin/createUser');
});

Route::get('/admin/viewCourses', function () {
    return view('admin/viewCourses');
});

Route::get('/admin/viewCourse', function () {
    return view('admin/viewCourse');
});

Route::get('/admin/createCourse', function () {
    return view('admin/createCourse');
});

//RegisterController
Route::prefix('register')->group(function(){
    Route::get('', 'App\Http\Controllers\RegistrationController@register')->name('register');
    Route::post('', 'App\Http\Controllers\RegistrationController@postRegister')->name('register');
    Route::get('/confirm/{token}', 'App\Http\Controllers\RegistrationController@confirmEmail')->name('confirmEmail');
});