<div class="s-header">
    <div class="container">
        <div class="sush-menubar">
            <ul id="primary-menu" class="header-menu" style="margin-top: 25px;">
                <li style="list-style: none">
                    <a class="text-danger" href="{{ url('/') }}">Home</a>
                </li>
            </ul>
            <div class="site-branding">
                <a href="{{ url('/') }}" class="custom-logo">
                    <img src="{{ url('public/system-images/logos/'.systemInformation()->logo) }}" alt="guyanamarriagematch" class="custom-logo">
                </a>
            </div>
            <nav class="stellarnav">
                <ul id="primary-menu" class="header-menu">
                    <li>
                        <a class="text-danger" href="{{ url('login') }}">Admin Login</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>