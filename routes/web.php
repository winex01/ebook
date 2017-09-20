 <?php

#auth route
Auth::routes();
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


#guest route
Route::get('/', 'GuestController@index')->name('index');
Route::get('/book-lists', 'GuestController@bookLists')->name('book.lists');


#user route
Route::get('/home', 'UserController@index')->name('home');



#admin routes
Route::prefix('admin')->group(function() {

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
	
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	

});

