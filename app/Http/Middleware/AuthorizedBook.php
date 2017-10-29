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

        flash()->overlay('Please login to view content.', 'System Message'); 

        // flash('Message')->overlay();

        // flash('Message')->success();

        return back();

    }
}
