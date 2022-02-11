<?php

namespace Modules\Setups\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use \App\User;
use \Modules\Setups\Entities\Role;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }
    
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return $this->show('1');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $data = [
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get(),
        ];
        return view('setups::admins.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);

        $admin = new User();
        $admin->fill($request->all());
        $admin->username = \Str::slug($request->username);
        $admin->password = bcrypt($request->password);
        $admin->save();

        return is_save($admin,'Admin Has been Added.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($info)
    {
        $explode = explode('&', $info);
        $role_id = isset($explode[0]) ? $explode[0] : 1;
        $gender = isset($explode[8]) ? $explode[8] : -1;

        $data = [
            'role_id' => $role_id,
            'gender' => $gender,
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get(),
            'admins' => User::when($role_id>0,function($query) use($role_id){
                            return $query->where('role_id',$role_id);
                        })
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->whereIn('role_id',json_decode(auth()->user()->role->sub_roles));
                        })
                        ->when($gender>=0, function($query) use($gender){
                            return $query->where('gender',$gender);
                        })
                        ->get(),
        ];

        return view('setups::admins.index',$data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = [
            'roles' => Role::where('status',1)
                        ->when(auth()->user()->role->is_main == 0,function($query){
                            return $query->where('is_main',0)->whereIn('id',json_decode(auth()->user()->role->sub_roles));
                        })->get(),
            'admin' => User::findOrFail($id)
        ];
        return view('setups::admins.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'status' => 'required'
        ]);

        $admin = User::findOrFail($id);
        $admin->fill($request->all());
        $admin->save();

        return is_save($admin,'Admin has been updated');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $admin = User::find($id)->delete();
        if($admin){
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]);
    }
}
