<?php

namespace App\Http\Middleware;

use Closure;

class Aspirant
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
        if (auth()->guest() || auth()->user()->role != 'aspirant') {
            return redirect('login');
        }

        return $next($request);
    }
}
