<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public static function getAll()
    {
    	return [
    		self::totalBooks(),
    		self::bookmarks(),
    		self::downloads(),
    		self::userRegistration(),
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

    private static function bookmarks()
    {
    	return [
    		'total' => 0,
            'header' => 'Bookmarks',
            'route' => 'javascript:;',
            'color' => 'bg-green',
            'icon' => 'ion ion-bookmark'  
    	];
    }

    private static function downloads()
    {
    	return [
    		'total' => 0,
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
