<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Activity
{
    public function handle($request, Closure $next, $guard = null)
    {
        if($request->user()){
            $request->user()->updated_at = date('Y-m-d H:i:s');
            $request->user()->save();
        }

    	return $next($request);
    }
}
