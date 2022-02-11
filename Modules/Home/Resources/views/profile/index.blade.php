@extends('home::profile.main')
@section('profile-content')
<div class="row gutters-5">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h2 class="fs-16 mb-0">Matched profile</h2>
            </div>
            <div class="card-body">
                @if(isset($matches[0]))
                    @foreach($matches as $key => $match)
                    @if($key > 0) <hr> @endif
                        <div class="row">
                            <div class="col-md-3 text-center">
                                @if(!empty($match->match->image) && file_exists(public_path('user-images/'.$match->match->image)))
                                  <img src="{{ url('public/user-images/'.$match->match->image) }}" style="width: 100%;border-radius: 3% !important;">
                                @else
                                  <img src="{{ url('public/'.($match->match->gender == 0 ? 'female' : 'male').'.jpg') }}" style="width: 100%;border-radius: 3% !important;">
                                @endif
                            </div>
                            <div class="col-md-9">
                                <h2><strong>{{ $match->match->name }}</strong></h2>
                                <h6>Age: {{ $match->match->profile->age }}</h6>
                                <h6>Phone: {{ $match->match->profile->phone }}&nbsp;|&nbsp;Email: {{ $match->match->email }}</h6>
                                <h6>{{ $match->match->profile->marital_status!="" ? 'Marital Status: '.maritalStatus()[$match->match->profile->marital_status] : '' }} {{ !empty($match->match->children) ? ', Number of Children: '.$match->match->children : '' }}</h6>
                                <h6><strong>Introduction:</strong></h6>
                                <p>{{ $match->match->profile->introduction }}</p>
                            </div>
                        </div>
                    @endforeach
                @else

                @endif
            </div>
        </div>
    </div>
</div>
@endsection
