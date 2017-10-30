<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
    	$books = \App\Book::paginate(4);

    	return view('guest.index', compact('books'));
    }

    public function bookLists()
    {
    	return view('guest.book-lists');
    }

    public function show($slug, $type)
    {   
        // type is used in authbook middleware

        $view = new \App\View($slug);
        $view->save();

        $book = $view->book();

        return view('guest.bookShow', compact('book'));
    }

    public function bookmark($slug, $type)
    {
        // type is used in authbook middleware
        if (\Auth::guard('web')->check()) {
            $bookmark = new \App\Bookmark($slug);
            $bookmark->save();
        }else {
            flash()->overlay('Administrator cannot bookmark book.', 'System Message');
        }

        return back();
    }

    public function download($slug, $type)
    {

        if (\Auth::guard('web')->check()) {
            $download = new \App\Download($slug);
            $download->save();
        }

        dd(\App\Download::thisBook($slug));

        return back();        
    }

}
