@extends('home::layouts.index')
@section('content')
<div class="py-4 py-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-xl-5 col-md-7 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-5 text-center">
                            <h1 class="h3 text-primary mb-0">Login to your Account</h1>
                        </div>
                        <form class="" method="POST" action="{{ route('signin.store') }}">
                        @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email or User Name" name="username" id="username" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">Password</label>
                                <input type="password" class="form-control " name="password" id="password" placeholder="********" required>
                            </div>
                            {{-- <div class="mb-3 text-right">
                                <a class="link-muted text-capitalize font-weight-normal" href="https://www.milansathi.com/password/reset">Forgot Password?</a>
                            </div> --}}
                            <div class="mb-5">
                                <button type="submit" class="btn btn-block btn-primary">Login to your Account</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <p class="text-muted mb-0">Don't have an account?</p>
                            <a href="{{ url('register') }}">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
