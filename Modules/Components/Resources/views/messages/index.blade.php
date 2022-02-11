@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Messages</strong>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ url('components/messages') }}" method="get" accept-charset="utf-8">
            <div class="row">
                <div class="col-2">
                    <div class="form-group">
                        <label for="from"><strong>From</strong></label>
                        <input type="date" name="from" id="from" value="{{ $from }}" class="form-control">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label for="to"><strong>To</strong></label>
                        <input type="date" name="to" id="to" value="{{ $to }}" class="form-control">
                    </div>
                </div>
                <div class="col-2">
                    <div class="form-group">
                        <label><strong>&nbsp;</strong></label>
                        <button type="submit" class="btn btn-md btn-primary btn-block"><i class="fa fa-search"></i>&nbsp;Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <span id="datatable-export-file-name" style="display: none;">Messages</span>
        <table class="table table-bordered table-striped datatable datatable-normal">
            <thead>
                <tr>
                    <th class="text-center">SL</th>
                    <th class="text-center">First Name</th>
                    <th class="text-center">Last Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Subject</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Date and Time</th>
                    <th class="text-center">Option</th></th>
                </tr>
            </thead>
            <tbody>
            @if(isset($messages[0]))
            @foreach($messages as $key => $mesage)
                <tr id="tr-{{ $mesage->id }}">
                    <td class="text-center" style="width: 2%">{{ $key+1 }}</td>
                    <td class="text-center">{{$mesage->first_name}}</td>
                    <td class="text-center">{{$mesage->last_name}}</td>
                    <td class="text-center">{{$mesage->email}}</td>
                    <td class="text-center">{{$mesage->phone}}</td>
                    <td class="text-center">{{$mesage->subject}}</td>
                    <td class="text-center">{{$mesage->message}}</td>
                    <td class="text-center">{{date('Y-m-d g:i a', strtotime($mesage->created_at))}}</td>
                    <td class="text-center"><a class="btn btn-danger btn-sm" href="{{route('messages.destroy',$mesage->id)}}"><i class="fa fa-trash"></i>Delete</a></td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
@endsection