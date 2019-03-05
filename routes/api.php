<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/applications/completed', 'LiquorLicenseController@completed');
// Route::get('/applications/completed/{search}', 'LiquorLicenseController@searchCompleted');
// Route::get('/applications/processed', 'LiquorLicenseController@processed');
// Route::get('/applications/paid', 'LiquorLicenseController@paid');
// Route::get('/{id}', 'LiquorLicenseController@show')->name('admin-app-id');
  