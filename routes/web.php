<?php

use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->group(function() {
    Route::get('users', \App\Http\Controllers\UsersController::class. '@index')->name('users.index');
    Route::get('user/create', \App\Http\Controllers\UsersController::class. '@create')->name('users.create');
    Route::post('user/store', \App\Http\Controllers\UsersController::class. '@store')->name('users.store');
    Route::delete('user/{id}/delete', \App\Http\Controllers\UsersController::class. '@destroy')->name('users.delete');
    Route::get('user/{id}/update', \App\Http\Controllers\UsersController::class. '@edit')->name('users.edit');
    Route::put('user/{id}/update', \App\Http\Controllers\UsersController::class. '@update')->name('users.update');

//роут для контента
Route::resource('content', 'App\Http\Controllers\CourseItemsController');


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
Route::prefix('register')->group(function () {
    Route::get('', 'App\Http\Controllers\RegistrationController@register')->name('register');
    Route::post('', 'App\Http\Controllers\RegistrationController@postRegister')->name('post-register');
    Route::get('/confirm/{token}', 'App\Http\Controllers\RegistrationController@confirmEmail')->name('confirmEmail');
});

//CoursesController
Route::middleware(['auth'])->group(function () {
    Route::prefix('/admin/courses')->group(function () {
        Route::name('courses-')->group(function () {
            Route::get('/create', 'App\Http\Controllers\Admin\CoursesController@create')->name('create');
            Route::post('/{id}/update', 'App\Http\Controllers\Admin\CoursesController@update')->name('update');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CoursesController@edit')->name('edit');
            Route::get('/{id}/delete', 'App\Http\Controllers\Admin\CoursesController@delete')->name('delete');
            Route::get('/{id}/view', 'App\Http\Controllers\Admin\CoursesController@view')->name('view');
            Route::post('/submit', 'App\Http\Controllers\Admin\CoursesController@submit')->name('submit');
            Route::get('', 'App\Http\Controllers\Admin\CoursesController@getAll')->name('all');
            Route::get('{id}/content-blocks', 'App\Http\Controllers\CourseItemsController@index')->name('index');
        });
    });
});

//Route::middleware()
//Route::post('/admin/courses/{id}/edit/content', 'App\Http\Controllers\CourseItemsController@index')->name('index');


// Route::middleware(['auth'])->prefix('admin/courses')->name('courses-')->group(function () {
//     Route::resource('/all', 'App\Http\Controllers\Admin\CoursesController@getAll')->name('all');
// });
