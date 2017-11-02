<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminBookmarksController extends Controller
{
    //
    public function all()
	{
		$views = \DB::table('book_user')
				->select('book_user.id', 'users.name', 'books.title', 'book_user.created_at')
				->join('users', 'users.id', '=', 'book_user.user_id')
				->join('books', 'books.id', '=', 'book_user.book_id')
				->orderBy('book_user.id' , 'desc')
				->get();

		return \DataTables::of($views)
				->editColumn('name', function($view){
					return ucwords($view->name);
				})
				->editColumn('created_at', function($view){
					return Carbon::parse($view->created_at)->diffForHumans();
				})
				// ->rawColumns(['created_at'])
				->make();
	}
}
