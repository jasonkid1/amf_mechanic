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

Route::get('/home', 'HomeController@index')->name('home.daashboard');
Route::get('home/search', 'HomeController@searchMechanics')->name('home.search');
Route::post('/profile', 'HomeController@updateAvatar')->name('profile');
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('/user/profile', 'HomeController@userProfile')->name('user.profile');

// User edit profile
Route::get('/user/edit', 'HomeController@editProfile')->name('user.edit');
Route::post('/user/edit', 'HomeController@submitEditProfile')->name('submit.user.edit');

// User Change Password
Route::get('/user/change-password', 'HomeController@changePassword')->name('user.change-password');
Route::post('/user/change-password', 'HomeController@submitChangePassword')->name('submit.change-password');
// User route to mechanic
Route::get('/user/mechanic/{mec}', 'HomeController@mechanicProfile')->name('user.mechanic');
// Add comment to mechanic
Route::post('/user/mechanic/{mec}/comment', 'User_Controller\MechanicController@store')->name('submit.comment');

// Login using socialize
Route::get('auth/facebook', ['as' => 'auth/facebook','uses' => 'Auth\LoginController@redirectToProvider']);
Route::get('auth/facebook/callback', ['as' => 'auth/facebook/callback','uses' => 'Auth\LoginController@handleProviderCallback']);


// Mechanic Route List
Route::prefix('mechanic')->group(function(){
	Route::get('/login', 'Auth\MechanicLoginController@showLoginForm')->name('mechanic.login');
	Route::get('/register', 'Auth\MechanicLoginController@showRegisterForm')->name('mechanic.register');
	Route::post('/login', 'Auth\MechanicLoginController@login')->name('mechanic.login.submit');
	Route::post('/register', 'Auth\MechanicLoginController@submitRegisterForm')->name('mechanic.register.submit');
	Route::get('/', 'MechanicController@index')->name('mechanic.dashboard');
	Route::get('/logout', 'Auth\MechanicLoginController@logout')->name('mechanic.logout');
	Route::get('/profile', 'Auth\MechanicLoginController@profile')->name('mechanic.profile');
	Route::post('/profile', 'MechanicController@updateMechanicAvatar')->name('update.avatar');

	// Password reset routes
	Route::post('/password/email', 'Auth\MechanicForgotPasswordController@sendResetLinkEmail')->name('mechanic.password.email');
	Route::get('/password/reset', 'Auth\MechanicForgotPasswordController@showLinkRequestForm')->name('mechanic.password.request');
	Route::post('/password/reset', 'Auth\MechanicResetPasswordController@reset');
	Route::get('/password/reset/{token}', 'Auth\MechanicResetPasswordController@showResetForm')->name('mechanic.password.reset');


});