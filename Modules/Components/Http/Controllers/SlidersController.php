<?php

namespace Modules\Components\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Components\Entities\Slider;

class SlidersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission');
    }
    
    public function index()
    {
        $data = [
            'sliders' => Slider::all()
        ];
        return view('components::sliders.index', $data);
    }

    public function create()
    {
        return view('components::sliders.create');
    }

    public function store(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|image'
        ]);

        $slider->fill($request->all());
        $slider->save();

        if($slider){
            $fileInfo = fileInfo($request->file);
            $name = $slider->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
            $upload=fileUpload($request->file,'sliders',$name);
            if($upload){
               $slider->slider = $name;
               $slider->save();
            }
        }

        return is_save($slider,'Slider has been Added.');
    }

    public function show($id)
    {
        return view('components::sliders.show');
    }

    public function edit($id)
    {
        $data = [
            'slider' => Slider::findOrFail($id)
        ];
        return view('components::sliders.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required'
        ]);

        if($request->hasFile('file')){
            $request->validate([
                'file' => 'required|image'
            ]);
        }

        $slider = Slider::findOrFail($id);
        $slider->fill($request->all());
        $slider->save();

        if($slider){
            if($request->hasFile('file')){
                $fileInfo=fileInfo($request->file);
                $name=$slider->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
                $upload=fileUpload($request->file,'sliders',$name);
                if($upload){
                   if(!empty($slider->slider)){
                    fileDelete('sliders/'.$slider->slider);
                   }

                   $slider->slider = $name;
                   $slider->save();
                }
            }
        }

        return is_save($slider,'Slider has been updated');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $delete = Slider::find($id)->delete();
        if($delete){
            if(!empty($slider->slider)){
                fileDelete('sliders/'.$slider->slider);
            }

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
