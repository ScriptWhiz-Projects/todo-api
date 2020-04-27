<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; 

class AuthBasic
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
        // Authenticate user. If auth fails, send back 401 in headers, else handle the next request
        if(Auth::onceBasic()) {
             return response()-json(["message" => "Invalid username / password",401]);
        } else {
            return $next($request);
        }
    }
}
