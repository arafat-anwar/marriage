<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class User
{
    
    public function handle($request, Closure $next, $guard = null)
    {
        if($request->user()){
    		$proceed = false;
	    	if(in_array($request->user()->role_id, [3])){
	    		$proceed = true;
	    	}

	    	if(!$proceed){
	    		session()->flash('danger', "Please login first!");
	    		return redirect('signin');
	    	}
        }

    	return $next($request);
    }
}
