<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="app-url" content="{{ url('/') }}">
    <meta name="file-base-url" content="{{ url('public/frontend') }}">
    <title>{{ systemInformation()->name }}</title>
    <link rel="icon" href="{{ url('public/system-images/icons/'.systemInformation()->icon) }}" type="image/png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta itemprop="image" content="{{ url('public/system-images/logos/'.systemInformation()->logo) }}">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="{{ url('public/frontend') }}/assets/line-icons/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{ url('public/frontend') }}/assets/css/vendors.css">
    <link rel="stylesheet" href="{{ url('public/frontend') }}/assets/css/aiz-core.css">
    <link rel="stylesheet" href="{{ url('public/frontend') }}/assets/css/stellarnav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" />

    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="{{url('public/lte')}}/wnoty/wnoty.css">

    <script>
        var AIZ = AIZ || {};
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            color: #6d6e6f;
        }

        :root {
            --primary: #000;
            --hov-primary: #000;
            --soft-primary: rgba(0,0,0,0.15) ;
            --secondary: #000;
            --soft-secondary: rgba(0,0,0,0.15);
        }

        .text-primary-grad {
            background: rgb(253, 41, 123);
            background: -moz-linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 100%);
            background: -webkit-linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 100%);
            background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn-primary,
        .bg-primary-grad {
            background: rgb(253, 41, 123);
            background: -moz-linear-gradient(225deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 100%);
            background: -webkit-linear-gradient(225deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 100%);
            background: linear-gradient(225deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 100%);
        }

        .fill-dark {
            fill: #4d4d4d;
        }

        .fill-primary-grad stop:nth-child(1) {
            stop-color: rgba(0,0,0,1);
        }

        .fill-primary-grad stop:nth-child(2) {
            stop-color: rgba(0,0,0,1);
        }

        .text-custom-black{
            color:  black !important;
            font-size: 14px !important;
        }

        .text-custom-black p{
            color:  black !important;
            font-size: 12px !important;
        }
        .custom-logo{
            max-height: 80px !important;
        }
        .text-custom-limegreen{
            color:  limegreen !important;
        }
    </style>
</head>

<body class="text-left" style="background-color: #D3D3D3 !important;">
    <div class="aiz-main-wrapper d-flex flex-column position-relative  bg-white">
        @include('home::layouts.header')
        @yield('content')
        @include('home::layouts.footer')
        @include('home::layouts.modals')
    </div>
    
    <script src="{{ url('public/frontend') }}/assets/js/vendors.js"></script>
    <script src="{{ url('public/frontend') }}/assets/js/aiz-core.js"></script>
    <script src="{{ url('public/frontend') }}/assets/js/stellarnav.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
    <script src="{{ url('public/frontend') }}/assets/js/custom.js"></script>

    <script src="{{url('public/lte')}}/wnoty/wnoty.js"></script>

    <script src="{{url('public/lte')}}/plugins/select2/js/select2.full.min.js"></script>

    @if(session()->has('success'))
    <script type="text/javascript">
      $(document).ready(function() {
        notify('{{session()->get('success')}}','success');
      });
    </script>
    @endif

    @if(session()->has('danger'))
    <script type="text/javascript">
      $(document).ready(function() {
        notify('{{session()->get('danger')}}','danger');
      });
    </script>
    @endif

    @if($errors->any())
    <script type="text/javascript">
      $(document).ready(function() {
        var errors=<?php echo json_encode($errors->all()); ?>;
        $.each(errors, function(index, val) {
           notify(val,'danger');
        });
      });
    </script>
    @endif

    <script type="text/javascript">
        $('.select2').select2()
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });

        function notify(message,type) {
          $.wnoty({
              message: '<strong class="text-'+(type)+'">'+(message)+'</strong>',
              type: type,
              autohideDelay: 10000
          });
        }
    </script>
</body>

</html>
