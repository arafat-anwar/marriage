@extends('home::layouts.index')
@section('content')
<section class="py-5" style="background-color: #D3D3D3 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 col-xxl-6 mx-auto">
                <div class="text-center section-title mb-5">
                    <h2 class="sush-title-lg mb-2 text-custom-limegreen">{{ $systemInformation->name }}</h2>
                    <div class="fw-400 sush-content text-custom-black">
                        {!! $systemInformation->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="position-relative overflow-hidden d-flex home-slider-area">
    <div class="absolute-full">
        <div class="aiz-carousel aiz-carousel-full" data-fade='true' data-infinite='true' data-autoplay='true'>
            @if(isset($sliders[0]))
            @foreach($sliders as $key => $slider)
                <img class="img-fit" src="{{ url('public/sliders/'.$slider->slider) }}">
            @endforeach
            @endif
        </div>
    </div>
    <div class="container">
        <div class="row mt-1 align-items-center">
            <div class="col-xl-5 col-lg-6 my-4">
                <div class="text-dark">

                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-5" style="background-color: #D3D3D3 !important;">
    <div class="container">
        <div class="row gutters-10 s-hbox">
            <div class="col-lg-12">
                <div class="text-center section-title mb-5">
                    <h2 class="sush-title-lg mb-3"><a href="{{ url('/') }}/pages/how_it_works" class="btn btn-warning btn-lg p-4 pl-5 pr-5">HOW IT WORKS</a></h2>
                </div>
            </div>
            
            <div class="col-lg">
                <a href="{{ url('/') }}/register">
                    <div class="sush-box p-3 mb-3" style="background-color: #28a745 !important;">
                        <div class="row align-items-center text-center">
                            <div class="col-12 pt-4">
                                <div><span class="s-steps">1</span></div>
                                <h3>Register</h3>
                            </div>
                            <div class="mt-3 col-5 text-right">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg">
                <a href="{{ url('/') }}/signin">
                    <div class="sush-box p-3 mb-3" style="background-color: #d41839 !important;">
                        <div class="row align-items-center text-center">
                            <div class="col-12 pt-4">
                                <div><span class="s-steps">2</span></div>
                                <h3>Sign in</h3>
                            </div>
                            <div class="mt-3 col-5 text-right">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg">
                <a href="{{ url('/') }}/search">
                    <div class="sush-box p-3 mb-3" style="background-color: #84827c !important;">
                        <div class="row align-items-center text-center">
                            <div class="col-12 pt-4">
                                <div><span class="s-steps">3</span></div>
                                <h3>Search Profiles</h3>
                            </div>
                            <div class="mt-3 col-5 text-right">
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection