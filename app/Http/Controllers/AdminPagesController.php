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
        
        $boxes = $this->boxes();
        return view('admin.admin-dashboard', compact('boxes'));
    }

    public function books()
    {
        return view('admin.books');
    }



    /* 
        ---------------------------------------------------------------------------------------------------------------

        private method's below

        ---------------------------------------------------------------------------------------------------------------
    */

    private function boxes()
    {
        return [
                //total books
                [
                    'total' => \App\Book::count(),
                    'header' => 'Total Books',
                    'route' => route('admin.books'),
                    'color' => 'bg-aqua',
                    'icon' => 'ion ion-ios-book'  
                ],
                // bookmarks
                [
                    'total' => 0,
                    'header' => 'Bookmarks',
                    'route' => 'javascript:;',
                    'color' => 'bg-green',
                    'icon' => 'ion ion-bookmark'  
                ],
                // downloads
                [
                    'total' => 0,
                    'header' => 'Downloads',
                    'route' => 'javascript:;',
                    'color' => 'bg-red',
                    'icon' => 'ion ion-pie-graph'  
                ],
                // user registration
                [
                    'total' => \App\User::count(),
                    'header' => 'User Registrations',
                    'route' => 'javascript:;',
                    'color' => 'bg-yellow',
                    'icon' => 'ion ion-person-add'  
                ]
        ];
    }
    
}
