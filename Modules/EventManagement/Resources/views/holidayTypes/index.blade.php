@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Holiday Types</strong>
        	<a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Holiday Type','{{ url('events-management/holiday-types/create') }}')"><i class=" fa fa-plus"></i>&nbsp;New Holiday Type</a>
        </h4>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Holiday Types</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Holiday This Year</th>
                    <th>Created By</th>
                    <th>Updated by</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($types[0]))
            @foreach($types as $key => $type)
                <tr id="tr-{{ $type->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{$type->name}}</td>
                    <td>{!! $type->desc !!}</td>
                    <td>{{$type->holidays->where(\DB::raw("substr('date,1,4')",date('Y')))->count()}}</td>
                    <td>{{$type->creator ? $type->creator->name : ''}}</td>
                    <td>{{$type->editor ? $type->editor->name : ''}}</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Holiday Type',
                            'object' => $type,
                            'link' => 'events-management/holiday-types'
                        ])
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection