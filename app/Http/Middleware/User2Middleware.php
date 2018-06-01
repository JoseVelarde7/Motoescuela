<?php

namespace App\Http\Middleware;

use Closure;

class User2Middleware
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
        if(auth()->check() && auth()->user()->user_tipo=='USER2')
            return $next($request);
        return redirect('login');
    }
}
