 <?php

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

#user route
Route::get('/home', 'HomeController@index')->name('home');
	#auth dir
	Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');

#admin routes
Route::prefix('admin')->group(function() {
	#auth dir
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
