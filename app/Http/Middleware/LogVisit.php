<?php

namespace App\Http\Middleware;

use Closure;

class LogVisit
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
        // Storage -> Logs -> laravel.log
        \Log::info("Visit time: ". date("Y-m-d H:i:s"). ", visit ip: ". $request->ip(). ", location visited: ". $request->fullUrl());
        return $next($request);
    }
}
