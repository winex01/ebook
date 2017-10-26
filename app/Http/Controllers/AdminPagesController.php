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
            
        $boxes = \App\Box::getAll();
        return view('admin.admin-dashboard', compact('boxes'));
    }

    public function books()
    {
        return view('admin.books');
    }
    
}
