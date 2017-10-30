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

        if (\Auth::guard('web')->check() || \Auth::guard('admin')->check()) {
            return $next($request);
        }

        // dd($request->route()->parameters());
        $input = $request->route()->parameters();
        
        // switch flash message
        switch ($input['type']) {
            case 'view':
                flash()->overlay('Please login to view content.', 'System Message'); 
                break;
            
            case 'bookmark':
                flash()->overlay('Please login to bookmark this content.', 'System Message'); 
                break;

            case 'download':
                flash()->overlay('Please login to download this content.', 'System Message'); 
                break;
        }

        return back();

    }

}
