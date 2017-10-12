 <?php

#auth route
Auth::routes();
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');


#guest route
Route::get('/testing', 'TestController@index')->name('index');
Route::get('/book-lists', 'GuestController@bookLists')->name('book.lists');
Route::get('/', 'GuestController@index')->name('index');


#user route
Route::get('/home', 'UserController@index')->name('home');



#admin routes
Route::prefix('admin')->group(function() {

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		
	// sidebar nav
	Route::get('/', 'AdminPagesController@index')->name('admin.dashboard');
	Route::get('/books', 'AdminPagesController@books')->name('admin.books');
	
	// book
	Route::get('/book/show/{slug}', 'AdminBookController@show');
	Route::delete('/book/delete/{book}', 'AdminBookController@delete');
	Route::post('/book/store', 'AdminBookController@store')->name('book.store');	
	Route::get('/book/all', 'AdminBookController@all');	

	// book page
	Route::post('/page/store', 'AdminBookPageController@store');
	Route::get('/page/all/{id}', 'AdminBookPageController@all');	

});

