<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Home\Entities\Profile;
use \Modules\Home\Entities\Match;
use \Modules\Home\Entities\Payment;

class RenewFee extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
        $this->middleware('authuser');
        $this->middleware('user');
        $this->middleware('paiduser');
    }
    
    public function payment()
    {
        // Payment::create([
        //     'user_id' => auth()->user()->id,
        //     'type' => 2,
        //     'info' => json_encode([]),
        // ]);

        // success("Your subscription has been renewed for 6 months!");
        // return redirect('profile');

        return view('home::renew.paypal');
    }

    public function success(Request $request)
    {
        Payment::create([
            'user_id' => auth()->user()->id,
            'type' => 2,
            'info' => json_encode($request->info),
        ]);

        success("Your subscription has been renewed for 6 months!");
        return redirect('profile');
    }
}
