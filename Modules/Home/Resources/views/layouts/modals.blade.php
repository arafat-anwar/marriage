<div class="aiz-mobile-bottom-nav d-xl-none fixed-bottom bg-white shadow-lg border-top rounded-top" style="box-shadow: 0px -1px 10px rgb(0 0 0 / 15%)!important; ">
    <div class="container">
        <div class="row align-items-center no-gutters text-center">
            <div class="col">
                <a href="{{ url('/') }}" class="text-reset d-block flex-grow-1 text-center py-2">
                    <i class="las la-home fs-18 opacity-60 opacity-100"></i>
                    <span class="d-block fs-10 opacity-60 opacity-100 fw-600">Home</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('pages/contact') }}" class="text-reset d-block flex-grow-1 text-center py-2">
                    <span class="d-inline-block position-relative px-2">
                        <i class="las la-bell fs-18 opacity-60 "></i>
                    </span>
                    <span class="d-block fs-10 opacity-60 ">Contact us</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('search') }}" class="text-reset d-block flex-grow-1 text-center py-2 ">
                    <span class="d-inline-block position-relative px-2">
                        <i class="las la-comment-dots fs-18 opacity-60 "></i>
                    </span>
                    <span class="d-block fs-10 opacity-60 ">Search</span>
                </a>
            </div>
            <div class="col">
                <a href="{{ url('profile') }}" class="text-reset d-block flex-grow-1 text-center py-2">
                    <span class="d-block mx-auto mb-1 opacity-60 ">
                        <img src="{{ url('public/system-images/icons/'.systemInformation()->icon) }}" class="rounded-circle size-20px">
                    </span>
                    <span class="d-block fs-10 opacity-60 ">{{ auth()->check() ? auth()->user()->name : 'Log in' }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<div class="aiz-cookie-alert">
    <div class="cookies-content">
        <div class="text-white mb-3">
            <p>
                <font color="#1b1b28">Are you looking for a Bride/Groom? If yes then accept site cookies.</font><br>
            </p>
        </div>
        <button class="btn btn-primary aiz-cookie-accepet">
            Ok. I Understood
        </button>
    </div>
</div>