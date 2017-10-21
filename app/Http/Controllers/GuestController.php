<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
    	$books = \App\Book::paginate(4);

    	return view('index', compact('books'));
    }

    public function bookLists()
    {
    	return view('book-lists');
    }

}
