<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \Modules\Components\Entities\Slider;
use \Modules\Home\Entities\Message;

class Home extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
    }
    
    public function index()
    {
        //auth()->loginUsingId(\App\User::where('role_id', 3)->first()->id);
        if(request()->has('create-dummy-accounts')){
            $names = [
                [
                    'first_name' => 'Adam',
                    'last_name' => 'Abraham',
                    'gender' => 1,
                ],[
                    'first_name' => 'Adrian',
                    'last_name' => 'Allan',
                    'gender' => 1,
                ],[
                    'first_name' => 'Alan',
                    'last_name' => 'Alsop',
                    'gender' => 1,
                ],[
                    'first_name' => 'Alexander',
                    'last_name' => 'Anderson',
                    'gender' => 1,
                ],[
                    'first_name' => 'Andrew',
                    'last_name' => 'Arnold',
                    'gender' => 1,
                ],[
                    'first_name' => 'Abigail',
                    'last_name' => 'Avery',
                    'gender' => 0,
                ],[
                    'first_name' => 'Alexandra',
                    'last_name' => 'Bailey',
                    'gender' => 0,
                ],[
                    'first_name' => 'Alison',
                    'last_name' => 'Baker',
                    'gender' => 0,
                ],[
                    'first_name' => 'Amanda',
                    'last_name' => 'Ball',
                    'gender' => 0,
                ],[
                    'first_name' => 'Amelia',
                    'last_name' => 'Berry',
                    'gender' => 0,
                ],
            ];

            foreach($names as $name){
                $user = \App\User::create([
                    'name' => $name['first_name'].' '.$name['last_name'],
                    'username' => strtolower($name['first_name']).'-'.strtolower($name['last_name']),
                    'password' => bcrypt(strtolower($name['first_name']).'-'.strtolower($name['last_name'])),
                    'role_id' => 3,
                    'gender' => $name['gender'],
                    'email' => strtolower($name['first_name']).'-'.strtolower($name['last_name']).'@example.com',
                    'relation' => 0,
                ]);

                \Modules\Home\Entities\Profile::create([
                    'user_id' => $user->id,
                    'first_name' => $name['first_name'],
                    'last_name' => $name['last_name'],
                    'phone' => rand(1000000000, 9999999999),
                    'age' => rand(18, 50),
                    'ethnic_origin' => 0,
                    'marital_status' => 0,
                    'height' => 0,
                    'body_type' => 0,
                    'religion' => 0,
                    'region' => 0,
                    'introduction' => '...',
                ]);

                \Modules\Home\Entities\Payment::create([
                    'user_id' => $user->id,
                    'type' => 0,
                    'info' => json_encode([]),
                ]);
            }
        }


        $data = [
            'systemInformation' => systemInformation(),
            'sliders' => Slider::where('status', 1)->get(),
        ];
        return view('home::index', $data);
    }

    public function pages($clue)
    {
        $data = [
            'clue' => $clue,
            'title' => clues()[$clue],
            'content' => systemInformation()[$clue],
        ];
        
        if(in_array($clue, ['contact'])){
             return view('home::contact', $data);
        }else{
            return view('home::pages', $data);
        }
        
    }
    
     

    public function contact(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string',
            'subject' => 'required|string|min:10',
            'message' => 'required|string|min:20|max:1000',
        ]);

        $message = Message::create($request->all());

        \Mail::send('home::emails.message', ['contact' => $message], function ($msg) use($request) {
            $msg
              ->to(systemInformation()->email, systemInformation()->name)
              ->bcc(['no-reply@guyanamarriagematch.com', systemInformation()->email])
              ->subject($request->subject);
        });

        return is_save($message, 'Thanks for contacting us. We will get back to you soon.');
    }
}
