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

        // if user is login not admin
        if (\Auth::guard('web')->check()) {
            // save views
            $view = new \App\View($slug);
            $view->save();
        }

        $book = \App\View::thisBook($slug);
        $pages = \App\Page::where('book_id', $book->id)->paginate(1);

        return view('guest.bookShow', compact('book', 'pages'));
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

        $path = \App\Download::thisBook($slug);

        if(!empty($path)) {
            $response = response()->download($path, $slug.'.zip')->deleteFileAfterSend(true);
            ob_end_clean();

            return $response;
        }

        return back();        
    }

}
