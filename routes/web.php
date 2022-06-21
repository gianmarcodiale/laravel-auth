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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Create route middleware for admin
Route::middleware('auth')
    ->prefix('admin')
    ->namespace('Admin')
    ->name('admin.')
    ->group(function () {
        // Admin dashboard
        Route::get('/', 'HomeController@index')->name('dashboard');
    });

// fallback route MUST be inserted at the end of web.php
Route::get("{any?}", function() {
    return view('guest.home');
})->where('any', '.*');
