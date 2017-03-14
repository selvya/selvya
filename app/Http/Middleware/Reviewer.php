<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Reviewer
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
        if (!Auth::check() OR Auth::user()->level !== 'reviewer') {
            return redirect('home');
        }

        return $next($request);
    }
}
