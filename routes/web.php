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

// This route is used by both user and admin for getting the application's notes
// Route::get('/application/{id}/notes', function ($id) {
//     return App\Note::where('application_id', $id)->with(['application.user','admin'])->get();
// });
Route::get('/application/{id}/notes', 'ApplicationNoteController@index');
Route::post('/application/{id}/notes', 'ApplicationNoteController@store');

Route::get('/payment-form/{id}', 'ApplicationPaymentController@getPaymentPage');
Route::post('/checkout', 'ApplicationPaymentController@charge');
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/my-applications', 'HomeController@my_applications')->name('my.applications');
Route::get('/applications/processed', 'HomeController@processed')->name('my.applications.processed');
Route::get('/applications/completed', 'HomeController@completed')->name('my.applications.completed');
Route::get('/applications/incomplete', 'HomeController@incomplete')->name('my.applications.incomplete');
Route::get('/applications/show/{id}/{status}', 'HomeController@showApplication')->name('my.applications.show.id');
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
