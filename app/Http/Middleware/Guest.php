<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Guest
{
    public function handle($request, Closure $next, $guard = null)
    {
        if($request->user()){
	    	if(in_array($request->user()->role_id, [3])){
	    		return redirect('profile');
	    	}else{
	    		return redirect('dashboard');
	    	}
        }

    	return $next($request);
    }
}
