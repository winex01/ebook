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

    public function show($slug)
    {
    	$book = \App\Book::where('slug', $slug)->first();

    	return view('guest.bookShow', compact('book'));
    }

}
