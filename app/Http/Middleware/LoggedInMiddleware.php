<?php

namespace App\Http\Middleware;

use Closure;

class LoggedInMiddleware
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
        if($request->session()->has("user"))
            if ($request->getPathInfo() == "/login" || $request->getPathInfo() == "/register")
                return redirect("/");
            else
                return $next($request);
        else
            if ($request->getPathInfo() == "/login" || $request->getPathInfo() == "/register")
                return $next($request);
            else
                return redirect("/login")->with("message", "You must be logged in to continue!");
    }
}
