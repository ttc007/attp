<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HOA VANG - FOOD SAFETY</title>

    <link href="{{ asset('img/logo.png')}}" rel="icon" type="image/png')}}">

    <link rel="stylesheet" href="{{ asset('css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <script src="{{ asset('js/lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('js/lib/tether/tether.min.js')}}"></script>
    <script src="{{ asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/plugins.js')}}"></script>
</head>
<body class="with-side-menu control-panel control-panel-compact sidebar-hidden">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">@yield('content')</div>
        </div><!--.container-fluid-->
    </div><!--.page-content-->
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
