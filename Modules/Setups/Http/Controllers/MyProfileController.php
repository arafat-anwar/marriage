<?php

namespace Modules\Setups\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;

class MyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('setups::myProfile.index');
    }
    
    public function create()
    {
        return redirect()->back();
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:15',
        ]);

        $search = User::where('username', $request->username)->where('id', '!=', auth()->user()->id)->first();
        if(isset($search->id)){
            whoops('Username already been taken');
            return back();
        }

        $search = User::where('email', $request->email)->where('id', '!=', auth()->user()->id)->first();
        if(isset($search->id)){
            whoops('Email Address already been taken');
            return back();
        }

        $search = User::where('phone', $request->phone)->where('id', '!=', auth()->user()->id)->first();
        if(isset($search->id)){
            whoops('Phone number already been taken');
            return back();
        }

        $user = auth()->user();
        $user->fill($request->all())->save();
        return is_save($user, 'Profile has been updated');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        return redirect()->back();
    }

    public function destroy($id)
    {
        return redirect()->back();
    }
}
