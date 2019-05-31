<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HOA TIEN - FOOD SAFETY</title>

    <link href="{{ asset('img/favicon.144x144.png')}}" rel="apple-touch-icon" type="image.png')}}" sizes="144x144">
    <link href="{{ asset('img/favicon.114x114.png')}}" rel="apple-touch-icon" type="image.png')}}" sizes="114x114">
    <link href="{{ asset('img/favicon.72x72.png')}}" rel="apple-touch-icon" type="image.png')}}" sizes="72x72">
    <link href="{{ asset('img/favicon.57x57.png')}}" rel="apple-touch-icon" type="image.png')}}">
    <link href="{{ asset('img/favicon.png')}}" rel="icon" type="image.png')}}">
    <link href="{{ asset('img/favicon.ico')}}" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/lobipanel/lobipanel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/lobipanel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/jqueryui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/pages/widgets.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-touchspin.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
    
    <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
    @yield('css')

</head>
<body class="with-side-menu-compact">

    @include('layouts.header')

    <div class="mobile-menu-left-overlay"></div>
    
    @include('layouts.sitebar')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">@yield('content')</div>
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{ asset('js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('js/app.js')}}"></script>
    @yield('script')
</body>
</html>
