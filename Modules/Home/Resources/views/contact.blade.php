@extends('home::layouts.index')
@section('content')
<section class="pt-4 mb-4">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-6 text-center text-lg-left">
                <h1 class="fw-600 h4">{{ $title }}</h1>
            </div>
            <div class="col-lg-6">
                <ul class="breadcrumb bg-transparent p-0 justify-content-center justify-content-lg-end">
                    <li class="breadcrumb-item opacity-50">
                        <a class="text-reset" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="text-dark fw-600 breadcrumb-item">
                        <a class="text-reset">{{ $title }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
    </div>
</section>

<section class="mb-4">
    <div class="container">
        <div class="row">
            @if(in_array($clue, ['contact']))
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 text-center">
                            <h1 class="h3 text-primary mb-0">Contact with us</h1>
                        </div>
                        <hr>
                        <form class="form-default" role="form" action="{{ url('contact') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input type="text" class="form-control " name="first_name" id="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input type="text" class="form-control " name="last_name" id="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="email">Email Address</label>
                                        <input type="email" class="form-control " name="email" id="email" placeholder="Email Address" required value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="phone">Phone #</label>
                                        <input type="text" class="form-control " name="phone" id="phone" placeholder="Phone" required value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" class="form-control " name="subject" id="subject" placeholder="Subject" required value="{{ old('subject') }}">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="message">Reason for contacting us</label>
                                <textarea class="form-control" name="message" id="message" rows = "3" cols = "40" maxlength = "1000" placeholder="Reason for contacting us" required style="height: 150px;resize: none">{{ old('message') }}</textarea>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-block btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@endsection
