@php
    $systemInformation = systemInformation();
@endphp
<footer class="aiz-footer fs-13 mt-auto text-white fw-400 pt-2 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl col-md-6">
                <div>
                    <ul class="list-unstyled  text-center">
                        @if(auth()->check() && in_array(auth()->user()->role_id, [3]))
                            <li class="my-3">
                                <a href="{{ url('profile/0/edit') }}" class="text-reset opacity-60">Update profile</a>
                            </li>
                            <li class="my-3">
                                <a href="{{ url('renew') }}" class="text-reset opacity-60">Renew membership</a>
                            </li>
                        @else
                            <li class="my-3">
                                <a href="{{ url('register') }}" class="text-reset opacity-60">Register</a>
                            </li>
                            <li class="my-3">
                                <a href="{{ url('signin') }}" class="text-reset opacity-60">Sign In</a>
                            </li>
                        @endif
                        
                        <li class="my-3">
                            <a href="{{ url('search') }}" class="text-reset opacity-60">Search Profiles</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl col-md-6">
                
            </div>
            <div class="col-xl col-md-6">
                <div>
                    <ul class="list-unstyled  text-center">
                        <li class="my-3">
                            <a href="{{ url('pages/about') }}" class="text-reset opacity-60">About us</a>
                        </li>
                        <li class="my-3">
                            <a href="{{ url('pages/contact') }}" class="text-reset opacity-60">Contact us</a>
                        </li>
                        <li class="my-3">
                            <a href="{{ url('pages/terms') }}" class="text-reset opacity-60">Terms and conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    	<div class="row">
    		<div class="col-lg-4"></div>
    		<div class="col-lg-4">
    			<div class="lh-1 text-center">
    			    <p>Affiliated websites</p>
    			    <hr>
    				<p><a href="https://guyanamarriagematch.com/" class="text-reset opacity-60" target="_blank">www.guyanamarriagematch.com</a></p>
    				<p><a href="https://trinidadmarriagematch.com/" class="text-reset opacity-60" target="_blank">www.trinidadmarriagematch.com</a></p>
    			</div>
    		</div>
    		<div class="col-lg-4"></div>
    </div>
    </div>
</footer>