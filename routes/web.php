 <?php

Route::get('/testing', function(){




	dd(\App\Book::mostViewed());




});


#auth route
Auth::routes();


#guest route
Route::get('/book-lists', 'GuestController@bookLists')->name('book.lists');
Route::get('/', 'GuestController@index')->name('index');
Route::middleware(['authbook'])->group(function () {
	Route::get('/book/{slug}/{type}', 'GuestController@show')->name('book.show');
	Route::get('/book/bookmark/{slug}/{type}', 'GuestController@bookmark')->name('book.bookmark');
	Route::get('/book/download/{slug}/{type}', 'GuestController@download')->name('book.download');
});


#user route
Route::get('/home', 'UserController@index')->name('home');
Route::get('user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::get('user/book', 'UserController@books');
Route::get('user/removeBookmark/{id}', 'UserController@removeBookmark')->name('removed.bookmark');


#admin routes
Route::prefix('admin')->group(function() {

	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		
	// sidebar nav
	Route::get('/downloads', 'AdminPagesController@downloads')->name('admin.downloads');
	Route::get('/bookmarks', 'AdminPagesController@bookmarks')->name('admin.bookmarks');
	Route::get('/views', 'AdminPagesController@views')->name('admin.views');
	Route::get('/books', 'AdminPagesController@books')->name('admin.books');
	Route::get('/', 'AdminPagesController@index')->name('admin.dashboard');

	// views
	Route::get('/views/all', 'AdminViewsController@all');
	// bookmarks
	Route::get('/bookmarks/all', 'AdminBookmarksController@all');
	// download
	Route::get('/downloads/all', 'AdminDownloadsController@all');
	
	// books
	Route::get('/book/show/{slug}', 'AdminBookController@show');
	Route::delete('/book/delete/', 'AdminBookController@delete');
	Route::post('/book/store', 'AdminBookController@store')->name('book.store');	
	Route::get('/book/all', 'AdminBookController@all');
	Route::patch('/book/update', 'AdminBookController@update');	

	// book page
	Route::post('/page/store', 'AdminBookPageController@store');
	Route::get('/page/all/{id}', 'AdminBookPageController@all');	
	Route::delete('/page/delete/{page}', 'AdminBookPageController@delete');
	Route::patch('/page/update/', 'AdminBookPageController@update');
});

