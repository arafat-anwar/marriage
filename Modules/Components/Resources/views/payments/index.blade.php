@extends('layouts.index')

@section('content')
<div class="card" style="margin-bottom: 25px;">
    <div class="card-header bg-info text-white" style="cursor: pointer;">
        <h4>
        	<strong>Payments</strong>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ url('components/payments') }}" method="get" accept-charset="utf-8">
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
                        <label for="type"><strong>Payment Type</strong></label>
                        <select class="form-control select2bs4" name="type" id="type">
                            <option value="-1">All Payments</option>
                            @foreach(paymentOptions() as $key => $option)
                            <option value="{{ $key }}" {{ $key == $type ? 'selected' : '' }}>{{ $option['name'] }}</option>
                            @endforeach
                        </select>
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
        <span id="datatable-export-file-name" style="display: none;">Payments</span>
        <table class="table table-bordered table-striped datatable datatable-normal">
            <thead>
                <tr>
                    <th class="text-center">SL</th>
                    <th class="text-center">Member</th>
                    <th class="text-center">Payment Type</th>
                    <th class="text-center">Fee</th>
                    <th class="text-center">Date and Time</th>
                    <th class="text-center">Option</th>
                </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
            @endphp
            @if(isset($payments[0]))
            @foreach($payments as $key => $payment)
            @php
                $total += paymentOptions()[$payment->type]['fee'];
            @endphp
                <tr id="tr-{{ $payment->id }}">
                    <td class="text-center" style="width: 2%">{{ $key+1 }}</td>
                    <td class="text-center">{{$payment->user->name}}</td>
                    <td class="text-center">{{paymentOptions()[$payment->type]['name']}}</td>
                    <td class="text-center">{{paymentOptions()[$payment->type]['fee']}}</td>
                    <td class="text-center">{{date('Y-m-d g:i a', strtotime($payment->created_at))}}</td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-danger text-white" onclick="Delete('{{ $payment->id }}','{{ url('components/payments') }}')">Delete</a>
                    </td>
                    
                </tr>
            @endforeach
            @endif

            <tr>
                <td class="text-center" style="width: 2%">{{ $payments->count()+1 }}</td>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="text-center"></td>
                <td class="text-center">{{$total}}</td>
                <td class="text-center"></td>
                <td class="text-center"></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection