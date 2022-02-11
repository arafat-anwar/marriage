@extends('home::layouts.index')
@section('content')
<style type="text/css">
    label{
        font-weight: bold !important;
    }
</style>
<section class="pt-6 bg-white text-center">
    <div class="container">
        <h1 class="mb-0 fw-600 text-dark">Search your Match</h1>
    </div>
</section>
<section class="py-4 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="pb-4">
                            <form action="{{ route('search.store') }}" method="post">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="name">Sex</label>
                                            <select class="form-control aiz-selectpicker" name="gender" id="gender" required>
                                                @foreach(genders() as $key => $g)
                                                    <option value="{{ $key }}">{{ $g }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="age">Ages</label>
                                            <select name="age[]" id="age" class="form-control aiz-selectpicker" multiple>
                                                @for($i=18;$i<=70;$i++)
                                                <option>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="marital_status">Marital Status</label>
                                            <select class="form-control aiz-selectpicker" name="marital_status[]" multiple>
                                                @foreach(maritalStatus() as $key => $status)
                                                    <option value="{{ $key }}">{{ $status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="ethnic_origin">Ethnic Origin</label>
                                            <select class="form-control aiz-selectpicker" name="ethnic_origin[]" multiple>
                                                @foreach(ethnicOrigins() as $key => $ethnic_origin)
                                                    <option value="{{ $key }}">{{ $ethnic_origin }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="height">Height</label>
                                            <select class="form-control aiz-selectpicker" name="height[]" multiple>
                                                @foreach(heights() as $key => $height)
                                                    <option value="{{ $key }}">{{ $height }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="body_type">Body type</label>
                                            <select class="form-control aiz-selectpicker" name="body_type[]" multiple>
                                                @foreach(bodyTypes() as $key => $body_type)
                                                    <option value="{{ $key }}">{{ $body_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="religion">Religion </label>
                                            <select class="form-control aiz-selectpicker" name="religion[]" multiple>
                                                @foreach(religions() as $key => $religion)
                                                    <option value="{{ $key }}">{{ $religion }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label" for="region">Where are you searching for a match?  </label>
                                            <select class="form-control aiz-selectpicker" name="region[]" multiple>
                                                @foreach(regions() as $key => $region)
                                                    <option value="{{ $key }}">{{ $region }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-block btn-primary mt-4">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
