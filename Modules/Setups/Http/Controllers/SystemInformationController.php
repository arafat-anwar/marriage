<?php

namespace Modules\Setups\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Setups\Entities\SystemInformation;

class SystemInformationController extends Controller
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
        $data = [
            'information' => SystemInformation::find(1)
        ];
        return view('setups::systemInformation.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('setups::systemInformation.create');
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
            //'phone' => 'required',
            'email' => 'required',
            // 'twitter' => 'required',
            // 'facebook' => 'required',
            // 'instagram' => 'required',
            // 'skype' => 'required',
            // 'linked_in' => 'required',
            // 'youtube' => 'required',
        ]);

        $information = SystemInformation::find(1);
        $information->fill($request->all());
        //$information->seo = generateSEO($request);
        $information->description = $request->desc;
        $information->save();

        if($information){
            if($request->hasFile('logo_file')){
                $fileInfo=fileInfo($request->logo_file);
                $name=$information->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                $upload=fileUpload($request->logo_file,'system-images/logos',$name);
                if($upload){
                   if(!empty($information->logo)){
                        fileDelete('system-images/logos/'.$information->logo);
                   }
                   $information->logo=$name;
                   $information->save();
                }
            }


            if($request->hasFile('icon_file')){
                $fileInfo=fileInfo($request->icon_file);
                $name=$information->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                $upload=fileUpload($request->icon_file,'system-images/icons',$name);
                if($upload){
                    if(!empty($information->icon)){
                        fileDelete('system-images/icons/'.$information->icon);
                    }
                   $information->icon=$name;
                   $information->save();
                }
            }
        }

        return is_save($information,'System Information Has been updated.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('setups::systemInformation.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('setups::systemInformation.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
