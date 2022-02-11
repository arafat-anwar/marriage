<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;

use \Modules\Home\Entities\Profile;
use \Modules\Home\Entities\Payment;

class RegistrationFee extends Controller
{
    public function payment()
    {
        // $user_data = session()->get('pending-registration');
        // $user = User::create([
        //     'name' => $user_data['first_name'].' '.$user_data['last_name'],
        //     'username' => $user_data['username'],
        //     'password' => bcrypt($user_data['password']),
        //     'role_id' => 3,
        //     'gender' => $user_data['gender'],
        //     'email' => $user_data['email'],
        //     'relation' => $user_data['relation'],
        // ]);

        // if($user){
        //     Profile::create([
        //         'user_id' => $user->id,
        //         'first_name' => $user_data['first_name'],
        //         'last_name' => $user_data['last_name'],
        //     ]);

        //     Payment::create([
        //         'user_id' => $user->id,
        //         'type' => 0,
        //         'info' => json_encode([]),
        //     ]);


            
        //     success("Congratulations, you are now registered for the exciting journey of finding your prefect match.");
        //     session()->forget('pending-registration');
        //     auth()->loginUsingId($user->id);
        //     \Mail::send('home::emails.welcome', [], function ($msg) {
        //         $msg
        //           ->to(auth()->user()->email, auth()->user()->name)
        //           ->subject('Welcome to '.systemInformation()->name);
        //     });
        //     return redirect('profile');
        // }
        
        if(!session()->has('pending-registration')){
            return redirect('profile');
        }
        return view('home::registration.paypal');
    }

    public function success(Request $request)
    {
        $user_data = session()->get('pending-registration');
        $user = User::create([
            'name' => $user_data['first_name'].' '.$user_data['last_name'],
            'username' => $user_data['username'],
            'password' => bcrypt($user_data['password']),
            'role_id' => 3,
            'gender' => $user_data['gender'],
            'email' => $user_data['email'],
            'relation' => $user_data['relation'],
        ]);

        if($user){
            Profile::create([
                'user_id' => $user->id,
                'first_name' => $user_data['first_name'],
                'last_name' => $user_data['last_name'],
            ]);

            Payment::create([
                'user_id' => $user->id,
                'type' => 0,
                'info' => json_encode($request->info),
            ]);
            
            success("Congratulations, you are now registered for the exciting journey of finding your prefect match.");
            session()->forget('pending-registration');
            auth()->loginUsingId($user->id);
            \Mail::send('home::emails.welcome', [], function ($msg) {
                $msg
                  ->to(auth()->user()->email, auth()->user()->name)
                  ->bcc(['no-reply@guyanamarriagematch.com', systemInformation()->email])
                  ->subject('Welcome to '.systemInformation()->name);
            });

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
    
    public function cancel()
    {
        session()->forget('pending-registration');
        whoops('Your registration process is failed! Please try again!');
        return redirect('register');
    }
}
