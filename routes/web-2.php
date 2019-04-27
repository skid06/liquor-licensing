<?php
use Illuminate\Http\Request;
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

/** Start of Vuetifyjs Test */
Route::get('/user/login', function () {
    return view('user.login');
});

Route::get('/vuetify', function () {
    return view('vuetify');
});

Route::get('/payment', function () {
    return view('payment');
});

/** End of Vuetifyjs Test */

Route::get('/payment-form/{id}', 'ApplicationPaymentController@getPaymentPage');
Route::post('/checkout', 'ApplicationPaymentController@charge');
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/liquor-application', function () {
    return view('vuetify');
});

Route::get('/test-login', function () {
    return view('user.login');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/my-applications', 'HomeController@my_applications')->name('my.applications');
Route::get('/applications/processed', 'HomeController@processed')->name('my.applications.processed');
Route::get('/applications/completed', 'HomeController@completed')->name('my.applications.completed');
Route::get('/applications/incomplete', 'HomeController@incomplete')->name('my.applications.incomplete');
Route::get('/applications/show/{id}/{status}', 'HomeController@showApplication')->name('my.applications.show.id');
Route::get('/applications/paid', 'HomeController@paid')->name('my.applications.paid');


/**
 * Start - These routes are used as API by user end.
 */
Route::prefix('/api/user/applications')->group(function() {

    /**
     * Start Notes' API
     * Used by /applications/show/{id}/completed in getting and posting application's notes
     */ 
    Route::get('/{id}/notes', 'ApplicationNoteController@index');
    Route::post('/{id}/notes', 'ApplicationNoteController@store');    
    /**
     * End Notes' API
     */

    // Used by /my-applications and different status
    Route::get('/{status}/{get}', 'LiquorApplicationController@authUserApplications');   

    // Route::post('/', 'UserLiquorLicenseController@store');
    Route::post('/', 'LiquorApplicationController@store');
    Route::get('/processed', 'UserLiquorLicenseController@index');
    Route::get('/{id}', 'UserLiquorLicenseController@edit');
    Route::post('/{id}/processed', 'UserLiquorLicenseController@processApplication');    
});  
/**
 * End - These routes are used as API by user end.
 */

/**
 * Start - These routes are used as web pages for admin.
 */ 
Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/completed', 'DashboardController@completed')->name('admin.completed');
    Route::get('/processed', 'DashboardController@processed')->name('admin.processed');
    Route::get('/paid', 'DashboardController@paid')->name('admin.paid');
    Route::get('/{id}', 'DashboardController@show')->name('admin.show');
    Route::get('/', 'DashboardController@main')->name('admin.dashboard');
    Route::get('/filter/payment/{by}/{count}', 'ApplicationPaymentController@filterPaymentByDate')->name('admin.filter.payments');
    Route::get('/filter/applications/{by}/{count}/{status}', 'LiquorLicenseController@filterApplicationByDate')->name('admin.filter.applications');
});
/**
 * End - These routes are used as web pages for admin.
 */ 

/**
 * Start - These routes are used as API by admin.
 */
Route::prefix('/api/admin/applications')->group(function() { 
    // Route::get('/applications/completed', 'LiquorLicenseController@completed');
    // Route::get('/applications/completed/{search}', 'LiquorLicenseController@searchCompleted');
    // Route::get('/applications/processed', 'LiquorLicenseController@processed');
    // Route::get('/applications/paid', 'LiquorLicenseController@paid');
    // Route::get('/{id}', 'LiquorLicenseController@show')->name('admin-app-id');

    // Used by /my-applications and different status
    Route::get('/{status}/{search?}', 'LiquorApplicationController@getApplications');  
});  
/**
 * End - These routes are used as API by admin.
 */    

Route::prefix('official')->group(function() {
    Route::get('/login', 'Auth\OfficialLoginController@showLoginForm')->name('official.login');
    Route::post('/login', 'Auth\OfficialLoginController@login')->name('official.login.submit');
    Route::get('/completed', 'OfficialDashboardController@completed')->name('official.completed');
    Route::get('/', 'OfficialDashboardController@completed')->name('official.dashboard');
});
