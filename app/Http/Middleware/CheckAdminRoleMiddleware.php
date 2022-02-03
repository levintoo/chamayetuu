<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->utype=='SUPERADMIN')
        {
            return $next($request);
        }else if(Auth::user()->utype=='ADM')
        {
            return $next($request);
        }
        else if(Auth::user()->utype=='SEC')
        {
            return $next($request);
        }
        abort(403);
    }
}
