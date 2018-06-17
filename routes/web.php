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

Route::prefix('verification')->group(function() {
    Route::get('new-request', function() {
        return view('verification.new_request');
    })->name('new_request');

    Route::post('new-request', 'VerificationController@addVerificationRequestImagesBased');
});

