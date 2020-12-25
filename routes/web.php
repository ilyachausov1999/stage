<?php

use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/test-block', function () {
    return view('admin/courses/test-block');
});

Route::get('/', function () {
    return view('layouts/custom');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Register
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
            Route::get('/{image}/del', 'App\Http\Controllers\Admin\CoursesController@deleteImage')->name('deleteimg');
            Route::get('/{id}/view', 'App\Http\Controllers\Admin\CoursesController@view')->name('view');
            Route::post('/submit', 'App\Http\Controllers\Admin\CoursesController@submit')->name('submit');
            Route::get('', 'App\Http\Controllers\Admin\CoursesController@getAll')->name('all');
            Route::get('{id}/content-blocks', 'App\Http\Controllers\CourseItemsController@index')->name('index');
            Route::post('{id}/content-blocks', 'App\Http\Controllers\CourseItemsController@store')->name('store');
            //tests
            //Route::get('{id}/content-blocks/tests', 'App\Http\Controllers\TestsController@index')->name('index');
            Route::get('{id}/tests', 'App\Http\Controllers\TestsController@testIndex')->name('testIndex');
            Route::get('{id}/tests/show', 'App\Http\Controllers\TestsController@show')->name('show');
            Route::get('{id}/tests/edit', 'App\Http\Controllers\TestsController@testEdit')->name('testEdit');
            Route::patch('{id}/tests/update', 'App\Http\Controllers\TestsController@testUpdate')->name('testUpdate');
            Route::delete('{id}/tests/delete', 'App\Http\Controllers\TestsController@destroy')->name('destroy');
            Route::get('{id}/create', 'App\Http\Controllers\TestsController@testCreate')->name('testCreate');
            Route::post('{id}/blocks-test', 'App\Http\Controllers\TestsController@testStore')->name('testStore');
        });
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('users', UsersController::class . '@index')->name('users.index');
        Route::get('user/create', UsersController::class . '@create')->name('users.create');
        Route::post('user/store', UsersController::class . '@store')->name('users.store');
        Route::delete('user/{id}/delete', UsersController::class . '@destroy')->name('users.delete');
        Route::get('user/{id}/update', UsersController::class . '@edit')->name('users.edit');
        Route::put('user/{id}/update', UsersController::class . '@update')->name('users.update');
        Route::get('assignments', AssignmentsController::class . '@index')->name('assignments.index');
        Route::post('user/{id}/assign', AssignmentsController::class . '@store')->name('assignments.store');
        Route::delete('assignments/{id}/delete', AssignmentsController::class . '@destroy')->name('assignments.delete');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('teacher')->group(function () {
        Route::get('users', UsersController::class . '@index')->name('teacher.users.index');
        Route::get('assignments', AssignmentsController::class . '@index')->name('teacher.assignments.index');
        Route::post('user/{id}/assign', AssignmentsController::class . '@store')->name('teacher.assignments.store');
        Route::delete('assignments/{id}/delete', AssignmentsController::class . '@destroy')->name('teacher.assignments.delete');
    });
});
Route::middleware(['auth'])->group(function () {
    Route::prefix('/teacher/courses')->group(function () {
        Route::name('teacher-courses-')->group(function () {
            Route::get('/create', 'App\Http\Controllers\Admin\CoursesController@create')->name('create');
            Route::post('/{id}/update', 'App\Http\Controllers\Admin\CoursesController@update')->name('update');
            Route::get('/{id}/edit', 'App\Http\Controllers\Admin\CoursesController@edit')->name('edit');
            Route::get('/{id}/delete', 'App\Http\Controllers\Admin\CoursesController@delete')->name('delete');
            Route::get('/{image}/del', 'App\Http\Controllers\Admin\CoursesController@deleteImage')->name('deleteimg');
            Route::get('/{id}/view', 'App\Http\Controllers\Admin\CoursesController@view')->name('view');
            Route::post('/submit', 'App\Http\Controllers\Admin\CoursesController@submit')->name('submit');
            Route::get('', 'App\Http\Controllers\Admin\CoursesController@getAll')->name('all');
            Route::get('{id}/content-blocks', 'App\Http\Controllers\CourseItemsController@index')->name('index');
            Route::post('{id}/content-blocks', 'App\Http\Controllers\CourseItemsController@store')->name('store');
            //tests
            //Route::get('{id}/content-blocks/tests', 'App\Http\Controllers\TestsController@index')->name('index');
            Route::get('{id}/tests', 'App\Http\Controllers\TestsController@testIndex')->name('testIndex');
            Route::get('{id}/tests/show', 'App\Http\Controllers\TestsController@show')->name('show');
            Route::get('{id}/tests/edit', 'App\Http\Controllers\TestsController@testEdit')->name('testEdit');
            Route::patch('{id}/tests/update', 'App\Http\Controllers\TestsController@testUpdate')->name('testUpdate');
            Route::delete('{id}/tests/delete', 'App\Http\Controllers\TestsController@destroy')->name('destroy');
            Route::get('{id}/create', 'App\Http\Controllers\TestsController@testCreate')->name('testCreate');
            Route::post('{id}/blocks-test', 'App\Http\Controllers\TestsController@testStore')->name('testStore');
        });
    });
});



Route::get('file/{filePath?}', \App\Http\Controllers\FileController::class . '@getFile')->name('file.get');


//Route::post('/admin/courses/{id}/edit/content', 'App\Http\Controllers\CourseItemsController@index')->name('index');

//Пользовательская часть
Route::prefix('courses')->name('custom-')->group(function () {
    Route::get('', 'App\Http\Controllers\Users\CustomController@getAll')->name('courses');
    Route::get('/{id}', 'App\Http\Controllers\Users\CustomController@view')->name('view');
    Route::middleware(['auth'])->group(function () {
        Route::get('{id}/block', 'App\Http\Controllers\Users\CustomController@show')->name('block');
    });
});
