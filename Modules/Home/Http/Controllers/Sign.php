<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;

class Sign extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
        $this->middleware('guest');
    }

    public function index()
    {
        $data = [
            'systemInformation' => systemInformation(),
        ];
        return view('home::sign.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();
        if(isset($user->id)){
            if(\Hash::check($request->password, $user->password)){
                auth()->loginUsingId($user->id);
                return redirect('profile');
            }

            whoops('Incorrect password!');
            return redirect()->back();
        }

        whoops('User not found!');
        return redirect()->back();
    }
}
