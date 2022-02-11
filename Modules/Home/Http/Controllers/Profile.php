<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Home\Entities\Match;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('pendingregistration');
        $this->middleware('authuser');
        $this->middleware('user');
        $this->middleware('paiduser');
        $this->middleware('renew');
    }

    public function index()
    {
        $data = [
            'user' => auth()->user(),
            'matches' => Match::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get(),
        ];
        return view('home::profile.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'email' => 'required|unique:users,email,'.auth()->user()->id,
            'relation' => 'required',
            'ethnic_origin' => 'required',
            'marital_status' => 'required',
            'height' => 'required',
            'body_type' => 'required',
            'religion' => 'required',
            'region' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->fill($request->all());
        $user->name = $request->first_name.' '.$request->last_name;
        $user->save();

        if($user){
            $profile = $user->profile;
            if(!isset($profile->id)){
                $profile = \Modules\Home\Entities\Profile::create([
                    'user_id' => $user->id
                ]);
            } 
            $profile->fill($request->all())->save();

            if($request->hasFile('file')){
                $fileInfo=fileInfo($request->file);
                $name=$user->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                $upload=fileUpload($request->file,'user-images',$name);
                if($upload){
                   if(!empty($user->image)){
                        fileDelete('user-images/'.$user->image);
                   }

                   $user->image=$name;
                   $user->save();
                }
            }

            success("Profile has been updated successfully.");
            return redirect()->back();
        }

        whoops();
        return redirect()->back();
    }

    public function edit()
    {
        $data = [
            'user' => auth()->user()
        ];
        return view('home::profile.update', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if(\Hash::check($request->current_password, auth()->user()->password)){
            auth()->user()->password = bcrypt($request->password);
            auth()->user()->save();

            success('Password has been updated.');
            return redirect()->back();
        }

        whoops('Current password not matched!');
        return redirect()->back();
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->back();
    }
}
