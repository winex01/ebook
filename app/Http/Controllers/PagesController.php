<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function bookLists()
    {
    	return view('book-lists');
    }

    public function students()
    {
        return view('students');
    }

    public function committees()
    {
    	return view('committees');
    }
}
