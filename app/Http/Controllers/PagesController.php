<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	return view('index');
    }

    public function bookList()
    {
    	return view('book-list');
    }

    public function students()
    {
    	return view('students');
    }
}
