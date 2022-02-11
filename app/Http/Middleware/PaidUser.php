<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class PaidUser
{
    public function handle($request, Closure $next, $guard = null)
    {
        if($request->user()){
    		$proceed = false;
	    	if(in_array($request->user()->role_id, [3])){
	    		$payment = \Modules\Home\Entities\Payment::where('user_id', $request->user()->id)->whereIn('type', [0, 2])->orderBy('id', 'desc')->first();
	    		if(isset($payment->id)){
	    			$proceed = true;
	    		}
	    	}

	    	if(!$proceed){
	    		session()->flash('danger', "Please Pay first!");
	    		return redirect('pay-registration-fee');
	    	}
        }

    	return $next($request);
    }
}
