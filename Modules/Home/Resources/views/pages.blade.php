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
            <div class="col-md-12">
                <div class="bg-white rounded overflow-hidden mw-100 text-left">
                    {!! $content !!}
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection
