<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
    	$books = \App\Book::paginate(4);

    	return view('guest.index', compact('books'));
    }

    public function bookLists()
    {
    	return view('guest.book-lists');
    }

    public function show($slug, $type)
    {   
        // type is used in authbook middleware

        $book = \App\Book::where('slug', $slug)->firstOrFail();
        $book->views()->attach(\Auth::user()->id);

        return view('guest.bookShow', compact('book'));
    }

    public function bookmark($slug, $type)
    {
        // type is used in authbook middleware

        $bookmark = new \App\Bookmark($slug);
        $bookmark->save();

        return back();
    }

    public function download($slug, $type)
    {
        
    }

}
