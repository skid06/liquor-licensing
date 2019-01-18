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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my-applications', 'HomeController@my_applications')->name('my.applications');
Route::get('/applications/processed', 'HomeController@processed')->name('my.applications.processed');
Route::get('/applications/completed', 'HomeController@completed')->name('my.applications.completed');
Route::get('/applications/incomplete', 'HomeController@incomplete')->name('my.applications.incomplete');
Route::get('/applications/incomplete/{id}', 'HomeController@showIncompleteApplication')->name('my.applications.incomplete.id');
Route::get('/applications/paid', 'HomeController@paid')->name('my.applications.paid');

// Route::post('/save-form', 'UserLiquorLicenseController@store');
// Route::get('/get_application', 'UserLiquorLicenseController@index');

Route::prefix('user/applications')->group(function() {
    Route::get('/', 'UserLiquorLicenseController@index'); 
    
    Route::get('/all', 'UserLiquorLicenseController@all');       
    Route::post('/', 'UserLiquorLicenseController@store');
    Route::get('/processed', 'UserLiquorLicenseController@index');
    Route::get('/{id}', 'UserLiquorLicenseController@edit');    
});  

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/completed', 'DashboardController@completed')->name('admin.completed');
    Route::get('/processed', 'DashboardController@processed')->name('admin.processed');
    Route::get('/paid', 'DashboardController@paid')->name('admin.paid');
    Route::get('/{id}', 'DashboardController@show')->name('admin.show');
    Route::get('/', 'DashboardController@main')->name('admin.dashboard');
});
