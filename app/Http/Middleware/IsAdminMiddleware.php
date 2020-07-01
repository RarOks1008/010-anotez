<?php

namespace App\Http\Middleware;

use Closure;

class IsAdminMiddleware
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
        if(strtolower($request->session()->get('user')->name) == "admin")
            return $next($request);
        else
            return redirect("/")->with("message", "You don't have the right to visit this page!");
    }
}
