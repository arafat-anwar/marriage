<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class AuthUser
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        if(!$request->user()){
            if(!checkLogin()){
            	return redirect('signin');
            }
        }

    	return $next($request);
    }
}
