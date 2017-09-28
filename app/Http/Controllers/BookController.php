<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use DataTables;

class BookController extends Controller
{
    /**
     * get all books using datatables library
     *
     * @return all books
     */
    public function all()
    {
        $books = Book::select(['id', 'title', 'created_at']);
        return DataTables::of($books)->addColumn('action', function ($book) {
                return '
                	<div align="center">
                		<button class="btn btn-xs btn-info"><i class="fa fa-info"></i> Info</button>
                		<button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i> Edit</button>
                		<button onclick="deleteBook('.$book->id.', \'' .$book->title. '\')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</button>
                	</div>
                ';
            })->make(true);
    }

    /**
     * add new book
     *
     * @return message
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        //store new book
        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return json_encode($book->id);
    }

    /**
     * remove book
     *
     * @return void
     */
    public function delete(Book $book)
    {
        Book::destroy($book->id);
    }



}
