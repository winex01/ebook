<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminViewsController extends Controller
{
    //
	public function all()
	{
		$views = \DB::table('book_view')
				->select('users.name', 'books.title', 'book_view.created_at')
				->join('users', 'users.id', '=', 'book_view.user_id')
				->join('books', 'books.id', '=', 'book_view.book_id')
				->orderBy('book_view.created_at' , 'desc')
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
