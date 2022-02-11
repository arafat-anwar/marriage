@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Sliders</strong>

            @if(isOptionPermitted('components/sliders','create'))
        	   <a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Slider','{{ url('components/sliders/create') }}')"><i class=" fa fa-plus"></i>&nbsp;Add New Slider</a>
            @endif
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Sliders</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Actions</th>
                    <th>Slider</th>
                    <th>Title</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($sliders[0]))
            @foreach($sliders as $key => $slider)
                <tr id="tr-{{ $slider->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Slider',
                            'object' => $slider,
                            'link' => 'components/sliders'
                        ])
                    </td>
                    <td>
                        @if(!empty($slider->slider) && file_exists(public_path('sliders/'.$slider->slider)))
                            <img src="{{ url('public/sliders/'.$slider->slider) }}" class="img img-fluid" style="max-height: 60px">
                        @endif
                    </td>
                    <td>{{$slider->title}}</td>
                    <td>{!! $slider->desc !!}</td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection