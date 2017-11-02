<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminDownloadsController extends Controller
{
    //
    public function all()
	{
		$downloads = \DB::table('book_download')
				->select('book_download.id', 'users.name', 'books.title', 'book_download.created_at')
				->join('users', 'users.id', '=', 'book_download.user_id')
				->join('books', 'books.id', '=', 'book_download.book_id')
				->orderBy('book_download.id' , 'desc')
				->get();

		return \DataTables::of($downloads)
				->editColumn('name', function($download){
					return ucwords($download->name);
				})
				->editColumn('created_at', function($download){
					return Carbon::parse($download->created_at)->diffForHumans();
				})
				// ->rawColumns(['created_at'])
				->make();
	}
}
