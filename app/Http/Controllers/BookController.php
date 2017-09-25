<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DataTables;

class BookController extends Controller
{

    public function getBooks()
    {
        $books = Book::select(['id', 'title', 'created_at']);

        return DataTables::of($books)->addColumn('action', function ($book) {
                return '
                	<div class="col-lg-offset-3 col-md-offset-3">
                		<a href="#info-'.$book->id.'" class="btn btn-xs btn-info"><i class="fa fa-info"></i> Info</a>
                		<a href="#edit-'.$book->id.'" class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</a>
                		<a href="#delete-'.$book->id.'" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                	</div>
                ';
            })->make(true);
    }
}
