<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Satker
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
        if (!Auth::check() OR Auth::user()->level !== 'satker') {
            return redirect('home');
        }

        return $next($request);
    }
}
