<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class PendingRegistration
{
    public function handle($request, Closure $next, $guard = null)
    {
        if(session()->has('pending-registration')){
        	session()->flash('danger', "Please Pay first!");
	    	return redirect('pay-registration-fee');
        }

    	return $next($request);
    }
}
