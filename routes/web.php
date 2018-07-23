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
Route::get('/verification/list/unreviewed', 'VerificationController@getUnreviewed');
Route::get('/verification/review-result/{id}', 'VerificationController@showReviewResult');
Route::get('/verificator/{id}', 'Verificator\VerificatorController@profile');
Route::get('/verificator/{id}/biography', 'Verificator\VerificatorController@showBiography')->name('show_verificator_biography');
Route::get('/user/{id}', 'UserController@profile');


/**
 * -----------------------------------------------------------------------------
 * Logged In User route area
 * -----------------------------------------------------------------------------
 */
Route::middleware('auth')->group(function() {
    Route::prefix('user')->group(function() {
        // TODO: pakai form POST method biar aman (ref: https://laracasts.com/discuss/channels/laravel/laravel-53-logout-methodnotallowed)
        Route::get('/logout', 'Auth\LoginController@logout');
        Route::get('/change', function() {
            return view('user.change', ['user' => Auth::user()]);
        });
        Route::post('/change', 'UserController@change');
        Route::post('/delete', 'UserController@delete')->name('user_delete');
    });

    Route::prefix('verification')->group(function() {
        Route::get('new-request/image-based', function() {
            return view('verification.new_request_image_based');
        });
        Route::get('new-request/link-based', function() {
            return view('verification.new_request_link_based');
        });
        Route::post('new-request/image-based', 'VerificationController@addVerificationRequestImagesBased')->name('new_request_image_based');
        Route::post('link-based', 'VerificationController@addVerificationRequestLinkBased')->name('new_request_link_based');

        Route::get('delete/{id}', 'VerificationController@delete');
        Route::get('detail/{id}', 'VerificationController@detail');
    });
});



/**
 * -----------------------------------------------------------------------------
 * Verificator route area
 * -----------------------------------------------------------------------------
 */
Route::namespace('Verificator')->prefix('verificator')->group(function() {
        Route::middleware('auth_verificator')->group(function() {
            Route::get('logout', 'Auth\LoginController@logout');
            Route::get('/change', function() {
                return view('verificator.change', ['verificator' => Auth::guard('web_verificator')->user()]);
            });
            Route::post('/change', 'VerificatorController@change');

            Route::get('review/form/{verification_item_id}', 'ReviewController@showForm');
            Route::post('review/form/{verification_item_id}', 'ReviewController@saveReview');
        });

        Route::middleware('verificator_guest')->group(function() {
            Route::get('login', 'Auth\LoginController@showLoginForm');
            Route::post('login', 'Auth\LoginController@login')->name('verificator.login');
        });
});

/**
 * -----------------------------------------------------------------------------
 * Admin route area
 * -----------------------------------------------------------------------------
 */
Route::prefix('admin')->group(function(){
    Route::middleware('auth_admin')
        ->namespace('Admin')
        ->group(function() {
            Route::get('logout', 'Auth\LoginController@logout');
            Route::get('/change', function() {
                return view('admin.change', ['admin' => Auth::guard('web_admin')->user()]);
            });
            Route::post('/change', 'AdminController@change');
            Route::get('/dashboard', function() {
                return view('admin.dashboard');
            })->name('admin.dashboard');
            Route::get('/admin-list', 'AdminController@all')->name('admin.list');
            Route::get('/create-new', function() {
                return view('admin.create-new');
            })->name('admin.create-new');
            Route::post('/create-new', 'AdminController@create')->name('create_admin');
            Route::get('/verification-list', 'AdminController@getVerificationList')->name('admin.verification-list');
            Route::get('/change', function() {
                return view('admin.change', ['admin' => Auth::guard('web_admin')->user()]);
            })->name('admin.change');
            Route::post('/change', 'AdminController@change');
        });

    Route::middleware('auth_admin')
        ->group(function() {
            Route::get('/user-list', 'UserController@all')->name('admin.user-list');
            Route::post('/user/delete/{id}', 'UserController@delete');

            Route::get('/verificator-list', 'Verificator\VerificatorController@all')->name('admin.verificator-list');
            Route::get('/verificator/create', function() {
                return view('admin.create-verificator');
            })->name('admin.verificator-create');
            Route::post('/verificator/create', 'Verificator\VerificatorController@create')->name('create_verificator');
            Route::post('/verificator/delete/{id}', 'Verificator\VerificatorController@delete');
            Route::get('/verificator/{id}/biography/create', 'Verificator\VerificatorController@createBiography');
            Route::post('/verificator/{id}/biography/create', 'Verificator\VerificatorController@saveBiography')->name('create_verificator_biography');

            Route::get('/verification/detail/{id}', 'VerificationController@detail');
            Route::get('/verification/delete/{id}', 'VerificationController@delete');
        });

    Route::middleware('admin_guest')
        ->namespace('Admin')
        ->group(function() {
            Route::get('login', 'Auth\LoginController@showLoginForm');
            Route::post('login', 'Auth\LoginController@login')->name('admin.login');
        });
});
