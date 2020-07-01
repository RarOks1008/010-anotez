<?php

namespace App\Http\Middleware;

use App\Models\LogAdmin;
use Closure;

class LogAdminMiddeleware
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
        $model = new LogAdmin();
        $date = date("Y-m-d H:i:s");
        $ip = $request->ip();
        $user = $request->session()->get('user')->email;
        $detail = $request->getPathInfo();
        $model->insertLog($ip, $user, $detail, $date);
        return $next($request);
    }
}
