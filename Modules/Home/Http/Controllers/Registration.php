<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Home\Entities\Profile;

class Registration extends Controller
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
        return view('home::registration.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
            'gender' => 'required',
            'email' => 'required|unique:users',
            'relation' => 'required',
            'agree' => 'required',
        ]);

        session()->put('pending-registration', $request->all());
        return redirect('pay-registration-fee');
    }
}
