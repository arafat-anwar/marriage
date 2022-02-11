@extends('home::layouts.index')
@section('content')
<div class="py-4 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5 text-center">
                            <h1 class="h3 text-primary mb-0">Create Your Account</h1>
                            <p>Fill out the form to get started.</p>
                        </div>
                        <form class="form-default" role="form" action="{{ route('register.store') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="relation">Profile for</label>
                                        <select class="form-control select2bs4" name="relation" id="relation" required>
                                            @foreach(relations() as $key => $relation)
                                                <option value="{{ $key }}">{{ $relation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="gender">Gender</label>
                                        <select class="form-control select2bs4" name="gender" id="gender" required>
                                            @foreach(genders() as $key => $gender)
                                                <option value="{{ $key }}">{{ $gender }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                        <label class="form-label" for="email">Email address</label>
                                        <input type="email" class="form-control " name="email" id="email" placeholder="Email address" required value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="username">User Name</label>
                                        <input type="text" class="form-control " name="username" id="username" placeholder="User Name" required value="{{ old('username') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" class="form-control " name="password" id="password" placeholder="********" required aria-label="********">
                                        <small>Minimun 6 characters</small>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" required placeholder="********">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="aiz-checkbox">
                                    <input type="checkbox" name="agree" required>
                                    <span class="opacity-60">By signing up you agree to our
                                        <a href="{{ url('pages/terms') }}" target="_blank">terms and conditions.</a>
                                    </span>
                                    <span class="aiz-square-check"></span>
                                </label>
                            </div>
                            <div class="mb-5">
                                <button type="submit" class="btn btn-block btn-primary">Create Account</button>
                            </div>
                            <div class="text-center">
                                <p class="text-muted mb-0">Already have an account?</p>
                                <a href="{{ url('signin') }}">Login to your Account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
