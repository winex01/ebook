<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\Auth::user());
        return view('user.home');
    }

    public function books()
    {
        // all users books
        $books = \App\Book::select(['id', 'title', 'slug', 'description'])->whereHas('bookmarks', function($query){
            $query->where('user_id', \Auth::user()->id);
        });
        return \DataTables::of($books)->addColumn('action', function ($book) {
                return '
                    <div align="center">
                        <div class="btn-group"> 
                            <a href="'.route('book.show', [$book->slug, 'views']).'" class="btn btn-xs btn-info"><i class="fa fa-check"></i> 
                                Read
                            </a>
                            <a href="javascript:;" onclick="confirmRemoveBookmark('.htmlentities($book).')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> 
                                Remove
                            </a>
                        </div>
                    </div>
                ';
            })
            ->editColumn('description', function ($book){
                $link = ' <a onclick="readDescription('.htmlentities($book).')" href="javascript:;" data-toggle="tooltip" title="Read More">(...)</a>';
                return str_limit($book->description, 80, $link);
            })
            ->rawColumns(['action', 'description'])
            ->make(true);
    }

    public function removeBookmark($id)
    {       
            // find user logged id
            $user = \App\User::findOrFail(\Auth::user()->id);
            // detach book_id from users bookmarks
            $user->bookmarks()->detach($id);

            //get book title
            $book = \App\Book::findOrFail($id);

            $response = [
                'title' => $book->title,
                'msg' => 'removed from your bookmarked' 
            ];
            
            return response()->json($response);

    }

}
