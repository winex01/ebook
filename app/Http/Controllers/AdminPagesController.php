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
            
        $boxes = \App\Box::all();
        return view('admin.admin-dashboard', compact('boxes'));
    }

    public function books()
    {
        return view('admin.books');
    }

    public function views()
    {
        return view('admin.views');
    }

    public function bookmarks()
    {
        return view('admin.bookmarks');
    }   

    public function downloads()
    {
        return view('admin.downloads');
    }
    
}
