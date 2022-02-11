@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Events</strong>
        	<a class="btn btn-success btn-sm" style="float: right" onclick="Show('New Event','{{ url('events-management/events/create') }}')"><i class=" fa fa-plus"></i>&nbsp;New Event</a>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 offset-md-4">
                <select class="form-control select2bs4" name="event_type_id" id="event_type_id">
                        <option value="0">All Event Types</option>
                        @if(isset($eventTypes[0]))
                        @foreach ($eventTypes as $key => $type)
                            <option value="{{$type->id}}" {{$event_type_id==$type->id ? 'selected' : ''}}>{{$type->name}}</option>
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
                <button type="button" class="btn btn-md btn-block btn-primary" onclick="openLink('{{ url('events-management/events') }}/'+$('#event_type_id').val()+'&'+$('#year').val())"><i class="fa fa-search"></i>&nbsp;Search</button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Events</span>
        <table class="table table-bordered table-striped datatable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Event Type</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Description</th>
                    <th>Created By</th>
                    <th>Updated by</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($events[0]))
            @foreach($events as $key => $event)
                <tr id="tr-{{ $event->id }}">
                    <td style="width: 2%">{{ $key+1 }}</td>
                    <td>{{$event->eventType->name}}</td>
                    <td>{{$event->title}}</td>
                    <td><strong>{{date('F j,Y',strtotime($event->from))}}</strong> to <strong>{{date('F j,Y',strtotime($event->to))}}</strong></td>
                    <td>{!! $event->desc !!}</td>
                    <td>{{$type->creator ? $type->creator->name : ''}}</td>
                    <td>{{$type->editor ? $type->editor->name : ''}}</td>
                    <td class="text-center" style="width: 15%">
                        @include('layouts.crudButtons',[
                            'text' => 'Event',
                            'object' => $event,
                            'link' => 'events-management/events'
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