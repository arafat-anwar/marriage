@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Holidays</strong>
        	<a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Holiday','{{ url('events-management/holidays/create') }}')"><i class=" fa fa-plus"></i>&nbsp;New Holiday</a>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 offset-md-4">
                <select class="form-control select2bs4" name="holiday_type_id" id="holiday_type_id">
                        <option value="0">All Holiday Types</option>
                        @if(isset($holidayTypes[0]))
                        @foreach ($holidayTypes as $key => $type)
                            <option value="{{$type->id}}" {{$holiday_type_id==$type->id ? 'selected' : ''}}>{{$type->name}}</option>
                        </optgroup>
                        @endforeach
                        @endif
                    </select>
                </select>
            </div>
            <div class="col-md-1">
                <select class="form-control select2bs4" name="year" id="year">
                    @for ($y = 2020;$y <= 2050;$y++)
                        <option {{$year==$y ? 'selected' : ''}}>{{$y}}</option>
                    </optgroup>
                    @endfor
                </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-md btn-block btn-primary" onclick="openLink('{{ url('events-management/holidays') }}/'+$('#holiday_type_id').val()+'&'+$('#year').val())"><i class="fa fa-search"></i>&nbsp;Search</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Holidays</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Holiday Type</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Updated by</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($holidays[0]))
            @foreach($holidays as $key => $holiday)
                <tr id="tr-{{ $holiday->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{$holiday->holidayType->name}}</td>
                    <td>{{$holiday->name}}</td>
                    <td>{{date('F j,Y',strtotime($holiday->date))}}</td>
                    <td>{!! $holiday->desc !!}</td>
                    <td>{{$type->creator ? $type->creator->name : ''}}</td>
                    <td>{{$type->editor ? $type->editor->name : ''}}</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Holiday',
                            'object' => $holiday,
                            'link' => 'events-management/holidays'
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