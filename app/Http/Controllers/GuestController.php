<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function bookLists()
    {
    	return view('book-lists');
    }

}
