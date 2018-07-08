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


/**
 * -----------------------------------------------------------------------------
 * Public route area
 * -----------------------------------------------------------------------------
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/verification/list', 'VerificationController@getReviewed');
Route::get('/verification/review-result/{id}', 'VerificationController@showReviewResult');


/**
 * -----------------------------------------------------------------------------
 * User route area
 * -----------------------------------------------------------------------------
 */
Route::middleware('auth')->group(function() {
    // TODO: pakai form POST method biar aman (ref: https://laracasts.com/discuss/channels/laravel/laravel-53-logout-methodnotallowed)
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::prefix('verification')->group(function() {
        Route::prefix('new-request')->group(function() {
            Route::get('image-based', function() {
                return view('verification.new_request_images_based');
            });
            Route::post('image-based', 'VerificationController@addVerificationRequestImagesBased')->name('new_request_images_based');

            Route::get('link-based', function() {
                return view('verification.new_request_link_based');
            });
            Route::post('link-based', 'VerificationController@addVerificationRequestLinkBased')->name('new_request_link_based');
        });

        Route::get('delete/{id}', 'VerificationController@cancelRequest');
        Route::get('detail/{id}', 'VerificationController@detail');

    });

    Route::get('/user/{id}', 'UserController@profile');
});



/**
 * -----------------------------------------------------------------------------
 * Verificator route area
 * -----------------------------------------------------------------------------
 */
Route::namespace('Verificator')->group(function() {
    Route::prefix('verificator')->group(function() {
        Route::middleware('auth_verificator')->group(function() {
            Route::get('logout', 'Auth\LoginController@logout');

            Route::get('review/form/{verification_item_id}', 'ReviewController@showForm');
            Route::post('review/form/{verification_item_id}', 'ReviewController@saveReview');
        });

        Route::middleware('verificator_guest')->group(function() {
            Route::get('login', 'Auth\LoginController@showLoginForm');
            Route::post('login', 'Auth\LoginController@login')->name('verificator.login');
        });
    });
});

