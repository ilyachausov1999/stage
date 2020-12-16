<?php

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

Route::get('/index', function () {
    return view('admin/index');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function() {
    Route::get('users', \App\Http\Controllers\UsersController::class. '@index')->name('users.index');
    Route::get('user/create', \App\Http\Controllers\UsersController::class. '@create')->name('users.create');
    Route::post('user/store', \App\Http\Controllers\UsersController::class. '@store')->name('users.store');
    Route::delete('user/{id}/delete', \App\Http\Controllers\UsersController::class. '@destroy')->name('users.delete');
    Route::get('user/{id}/update', \App\Http\Controllers\UsersController::class. '@edit')->name('users.edit');
    Route::put('user/{id}/update', \App\Http\Controllers\UsersController::class. '@update')->name('users.update');


});
