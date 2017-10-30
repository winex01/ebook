<?php

namespace App;

class Box
{
    public static function all()
    {
    	return [
            self::totalBooks(),
    		self::userRegistration(),
            self::totalViews(),
            self::bookmarks(),
            self::downloads(),
    	];
    }

    public static function totalBooks()
    {
    	return [
            'total' => \App\Book::count(),
            'header' => 'Total Books',
            'route' => route('admin.books'),
            'color' => 'bg-aqua',
            'icon' => 'ion ion-ios-book'  
       	];
    }

    private static function totalViews()
    {
        $totalViews = \DB::table('book_view')->count();

        return [
            'total' => $totalViews,
            'header' => 'Book Views',
            'route' => 'javascript:;',
            'color' => 'bg-primary',
            'icon' => 'ion ion-eye'  
        ];
    }

    private static function bookmarks()
    {
        $bookmarks = \DB::table('book_user')->count();

    	return [
    		'total' => $bookmarks,
            'header' => 'Bookmarks',
            'route' => 'javascript:;',
            'color' => 'bg-green',
            'icon' => 'ion ion-bookmark'  
    	];
    }

    private static function downloads()
    {
        $downloads = \DB::table('book_download')->count();

    	return [
    		'total' => $downloads,
	        'header' => 'Downloads',
	        'route' => 'javascript:;',
	        'color' => 'bg-red',
	        'icon' => 'ion ion-pie-graph'
    	];
    }

    private static function userRegistration()
    {
    	return [
    		'total' => \App\User::count(),
	        'header' => 'User Registrations',
	        'route' => 'javascript:;',
	        'color' => 'bg-yellow',
	        'icon' => 'ion ion-person-add'  
    	];
    }


}
