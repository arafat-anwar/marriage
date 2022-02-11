@extends('home::layouts.index')
@section('content')
<section class="pt-6 pb-4 bg-white text-center">
    <div class="container">
        <h1 class="mb-0 fw-600 text-dark">Select Your Package</h1>
    </div>
</section>
<section class="py-5 bg-white">
    <div class="container">
        <div class="aiz-carousel slick-initialized slick-slider" data-items="4" data-xl-items="3" data-md-items="2" data-sm-items="1" data-dots="true" data-infinite="true" data-autoplay="true">
            <div class="slick-list draggable">
                <div class="slick-track" style="opacity: 1; width: 343px; transform: translate3d(0px, 0px, 0px);">
                    <div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 343px;">
                        <div>
                            <div class="carousel-box" style="width: 100%; display: inline-block;">
                                <div class="overflow-hidden shadow-none border-right">
                                    <div class="card-body">
                                        <div class="text-center mb-4 mt-3">
                                            <img class="mw-100 mx-auto mb-4" src="{{ url('/') }}/public/frontend/uploads/all/9K3LcQCzoUkefpFlEsTT9OvgGGPA6jZ3wSkCTMQk.png" height="130">
                                            <h5 class="mb-3 h5 fw-600">Basic</h5>
                                        </div>
                                        <div class="mb-5 text-dark text-center">
                                            <span class="sush-title-lg fw-600 lh-1 mb-0"></span>
                                            <span class="text-secondary d-block">validity 90 Days</span>
                                        </div>
                                        <div class="text-center">
                                            <a href="{{ url('pay-renew-fee') }}" class="btn btn-light" tabindex="0">Purchase This Package</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
