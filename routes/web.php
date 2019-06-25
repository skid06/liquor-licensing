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
})->name('user.login');

Route::get('/user/register', function () {
    return view('user.register');
});

Route::post('/user/register', 'Auth\\RegisterController@register');

Route::get('/vuetify', function () {
    return view('vuetify');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/profile', function () {
    return view('user.profile');
});

Route::get('/class/fees', function () {
    return \App\ClassFee::get();
});


Route::get('/user/info', function () {
    if(\Auth::guard('admin')->user()){
        return \App\Admin::where('id', \Auth::guard('admin')->user()->id)->first();
    }
    elseif(Auth::guard('web')->user()){
        return \App\User::where('id', \Auth::user()->id)->first();
    }
    // return \App\User::where('id', \Auth::user()->id)->first();
});

Route::get('/application/cost/{id}', function ($id) {
    $app = \App\LiquorApplication::whereId($id)->first();
    return $cost = \App\ClassFee::whereId($app->class_fee_id)->first();

    return response()->json(['cost' => $cost]);
});

// Route::get('/liquor-application', function () {
//     return view('user.application-form');
// });
/** End of Vuetifyjs Test */

// Route::get('/payment-form/{id}', 'ApplicationPaymentController@getPaymentPage');
Route::get('/payment/{id}', 'ApplicationPaymentController@getPaymentPage');
Route::post('/checkout', 'ApplicationPaymentController@charge');
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test-login', function () {
    return view('user.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/pdf', function () {
    return view('liquor-application-pdf');
});

Route::post('/send-email-with-pdf', 'LiquorApplicationController@sendEmailWithPDF');

Route::get('/user/type', function () {
    if(\Auth::guard('web')->user())
        return response()->json(['type' => 'user']);
    elseif(\Auth::guard('admin')->user())
        return response()->json(['type' => 'admin']);
});

Route::post('/user/edit', 'UserController@editUserInfo');

Route::get('/my-applications', 'HomeController@my_applications')->name('my.applications');
Route::get('/liquor-application/{id?}', 'HomeController@index')->name('my.application.form');
Route::get('/applications/{status}', 'HomeController@get')->name('my.applications.all');
Route::get('/applications/processed', 'HomeController@processed')->name('my.applications.processed');
Route::get('/applications/completed', 'HomeController@completed')->name('my.applications.completed');
Route::get('/applications/incomplete', 'HomeController@incomplete')->name('my.applications.incomplete');
Route::get('/applications/show/{id}/{status}', 'HomeController@showApplication')->name('my.applications.show.id');
Route::get('/applications/paid', 'HomeController@paid')->name('my.applications.paid');


/**
 * Start - These routes are used as API by user end.
 */
Route::prefix('/user/applications')->group(function() {

    /**
     * Start Notes' API
     * Used by /applications/show/{id}/completed in getting and posting application's notes
     */ 
    Route::post('/store', 'LiquorApplicationController@store');
    Route::get('/id/{id}', 'LiquorApplicationController@getApplicationById');
    Route::get('/{id}/notes', 'ApplicationNoteController@index');
    Route::post('/{id}/notes', 'ApplicationNoteController@store');    
    /**
     * End Notes' API
     */

    // Route::get('/{type}', 'LiquorApplicationController@index');
    // Used by /my-applications and different status
    Route::get('/status/{status}/{search?}', 'LiquorApplicationController@authUserApplications');   
    
    // Route::post('/', 'UserLiquorLicenseController@store');authUserApplicationbyId

    Route::get('/processed', 'UserLiquorLicenseController@index');
    
    Route::post('/{id}/processed', 'LiquorApplicationController@processApplication');    
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
    Route::get('/liquor-application/{id}', 'DashboardController@viewForm')->name('admin.view.application.form');
    Route::get('/completed', 'DashboardController@completed')->name('admin.completed');
    Route::get('/processed', 'DashboardController@processed')->name('admin.processed');
    Route::get('/paid', 'DashboardController@paid')->name('admin.paid');
    Route::get('/payments', 'ApplicationPaymentController@showPayments');
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
Route::get('/payments', 'ApplicationPaymentController@index');
Route::prefix('/api/admin/applications')->group(function() { 
    // Route::get('/applications/completed', 'LiquorLicenseController@completed');
    // Route::get('/applications/completed/{search}', 'LiquorLicenseController@searchCompleted');
    // Route::get('/applications/processed', 'LiquorLicenseController@processed');
    // Route::get('/applications/paid', 'LiquorLicenseController@paid');
    // Route::get('/{id}', 'LiquorLicenseController@show')->name('admin-app-id');

    // Used by /my-applications and different status
    // Route::get('/{status}/{search?}', 'LiquorApplicationController@getApplications');  
    
    Route::get('/{search?}', 'LiquorApplicationController@getApplications');      
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
