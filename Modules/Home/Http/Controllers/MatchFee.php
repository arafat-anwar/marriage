<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Home\Entities\Profile;
use \Modules\Home\Entities\Match;
use \Modules\Home\Entities\Payment;

class MatchFee extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
        $this->middleware('authuser');
        $this->middleware('user');
        $this->middleware('paiduser');
        $this->middleware('renew');
    }
    
    public function payment()
    {
        // Payment::create([
        //     'user_id' => auth()->user()->id,
        //     'type' => 1,
        //     'info' => json_encode([]),
        // ]);
        
        // $match = User::find(session()->get('pending-match'));
        // Match::create([
        //     'user_id' => auth()->user()->id,
        //     'matched_with' => $match->id,
        // ]);

        // \Mail::send('home::emails.match', ['match' => $match], function ($msg) {
        //     $msg
        //       ->to(auth()->user()->email, auth()->user()->name)
        //       ->cc(['no-reply@guyanamarriagematch.com', systemInformation()->email])
        //       ->subject('One Match Found!');
        // });

        // session()->forget('pending-match');
        // success("Congratulations, we found your match and sent you a message with the details. Please check your email and dashboard for your search result");
        // return redirect('search');

        if(!session()->has('pending-match')){
            return redirect('search');
        }
        return view('home::search.paypal');
    }

    public function success(Request $request)
    {
        Payment::create([
            'user_id' => auth()->user()->id,
            'type' => 1,
            'info' => json_encode($request->info),
        ]);

        $match = User::find(session()->get('pending-match'));
        Match::create([
            'user_id' => auth()->user()->id,
            'matched_with' => $match->id,
        ]);

        \Mail::send('home::emails.match', ['match' => $match], function ($msg) {
            $msg
              ->to(auth()->user()->email, auth()->user()->name)
              ->bcc(['no-reply@guyanamarriagematch.com', systemInformation()->email])
              ->subject('One Match Found!');
        });
        
        success("Congratulations, you found a match, please check your email and your DASHBOARD for more information");
        return response()->json([
            'success' => true
        ]);
    }
    
    public function cancel()
    {
        session()->forget('pending-match');
        whoops('Your matching process is failed! Please search again!');
        return redirect('search');
    }
}
