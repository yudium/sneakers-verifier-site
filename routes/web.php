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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function() {
    // TODO: pakai form POST method biar aman (ref: https://laracasts.com/discuss/channels/laravel/laravel-53-logout-methodnotallowed)
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::prefix('verification')->group(function() {
        Route::get('new-request', function() {
            return view('verification.new_request');
        })->name('new_request');

        Route::post('new-request', 'VerificationController@addVerificationRequestImagesBased');
    });

    Route::get('/user/{id}', 'UserController@profile');
});

