 <?php

Auth::routes();


#pages controller front/welcome
Route::get('/', 'PagesController@index')->name('index');
Route::get('/book-lists', 'PagesController@bookLists')->name('book.lists');
Route::get('/students', 'PagesController@students')->name('students');
Route::get('/committees', 'PagesController@committees')->name('committees');



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


// temporary
Route::get('/admin-template', function() {
	return view('admin_template');
});

Route::get('/template', function() {
	return view('template');
});