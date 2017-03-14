<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">

    <title>OJKWAY</title>

    <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="shortcut icon" href="{{asset('vendor/img/favicon.png')}}">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon57.png')}}" sizes="57x57">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon72.png')}}" sizes="72x72">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon76.png')}}" sizes="76x76">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon114.png')}}" sizes="114x114">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon120.png')}}" sizes="120x120">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon144.png')}}" sizes="144x144">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon152.png')}}" sizes="152x152">
    <link rel="apple-touch-icon" href="{{asset('vendor/img/icon180.png')}}" sizes="180x180">
    <link rel="stylesheet" href="{{asset('vendor/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/notie.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/css/themes.css')}}">
    @yield('css')
</head>
<body>
    <div id="page-wrapper">
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <!-- Activity Bar -->
            @include('include.activitybar')
            <!-- END Activity Bar -->

            @include('include.leftbar')

            <!-- Main Container -->
            <div id="main-container">
                <!-- END topbar -->
                @include('include.topbar')
                <!-- END topbar -->
                @yield('content')
                <!-- Footer -->
                @include('include.footer')
                <!-- END Footer -->
            </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
    </div>
    <!-- END Page Wrapper -->

    <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
    <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>   

    <script src="{{asset('vendor/js/vendor/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('vendor/js/plugins.js')}}"></script>
    <script src="{{asset('vendor/js/app.js')}}"></script>    
    <script src="{{asset('js/notie.min.js')}}"></script>
    <script type="text/javascript">
        $('#logout').click(function(){
            $('#logout-form').submit();
        });
    </script> 
    @yield('js')
</body>
</html>