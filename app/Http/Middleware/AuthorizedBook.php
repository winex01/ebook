<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizedBook
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // dd($request->route()->parameters());
        $input = $request->route()->parameters();

        if (\Auth::guard('web')->check() || \Auth::guard('admin')->check()) {
            
            $book = \App\Book::where('slug', $input['slug'])->firstOrFail();

            // if user is login (not allow on admin)
            if (\Auth::guard('web')->check()) {
                switch ($input['type']) {
                    case 'views':
                        // attach user to book views
                        $book->views()->attach(\Auth::user()->id);
                        break;
                    
                    case 'bookmarks':
                        // check if user already bookmark book
                        $checkBook = \DB::table('book_user')
                                    ->where('book_id', $book->id)
                                    ->where('user_id', \Auth::user()->id)
                                    ->get();
                        
                        if (!count($checkBook)) {
                            $book->bookmarks()->attach(\Auth::user()->id);
                            flash()->overlay('Bookmark Successfully.', 'System Message'); 
                        }else{
                            flash()->overlay('You already bookmark this book.', 'System Message'); 
                        }

                        return back(); #return back after bookmarked successfully
                        break;

                    case 'downloads':
                        // flash()->overlay('Please login to view content.', 'System Message'); 
                        break;
                                        
                    default:
                        // should not happen! if this happen call 911
                        break;
                }


            }

            return $next($request);
        }


        // switch flash message
        switch ($input['type']) {
            case 'views':
                flash()->overlay('Please login to view content.', 'System Message'); 
                break;
            
            case 'bookmarks':
                flash()->overlay('Please login to bookmark this content.', 'System Message'); 
                break;

            case 'downloads':
                flash()->overlay('Please login to download this content.', 'System Message'); 
                break;
        }

        return back();

    }

}
