<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalBooks = \App\Book::count();
        return view('admin.admin-dashboard', compact('totalBooks'));
    }

    public function books()
    {
        return view('admin.books');
    }

    
    
}
