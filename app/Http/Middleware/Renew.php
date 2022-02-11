<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Renew
{
    public function handle($request, Closure $next, $guard = null)
    {
        if($request->user()){
    		$proceed = false;
	    	if(in_array($request->user()->role_id, [3])){
	    		$payment = \Modules\Home\Entities\Payment::where('user_id', $request->user()->id)->whereIn('type', [0, 2])->orderBy('id', 'desc')->first();
	    		if(isset($payment->id)){
	    			if(date('Y-m-d', strtotime(date('Y-m-d', strtotime($payment->created_at)).'+ 90 days')) >= date('Y-m-d')){
	    				$proceed = true;
	    			}
	    		}
	    	}

	    	if(!$proceed){
	    		session()->flash('danger', "You must renew your subscription.");
	    		return redirect('renew');
	    	}
        }

    	return $next($request);
    }
}
