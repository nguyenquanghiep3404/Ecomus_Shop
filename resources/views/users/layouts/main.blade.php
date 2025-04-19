

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">


<!-- Mirrored from themesflat.co/html/ecomus/home-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:42:25 GMT -->
<head>
    <meta charset="utf-8">
    <title>
        @section('title')
        Ecomus |
    @show
    </title>

    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <!-- font -->
   <link rel="stylesheet" href="{{ asset('user/assets/fonts/fonts.css')}}">
   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('user/assets/fonts/font-icons.css')}}">
   <link rel="stylesheet" href="{{ asset('user/assets/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{ asset('user/assets/css/swiper-bundle.min.css')}}">
   <link rel="stylesheet" href="{{ asset('user/assets/css/animate.css')}}">
   <link rel="stylesheet"type="text/css" href="{{ asset('user/assets/css/styles.css')}}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('user/assets/images/logo/favicon.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('user/assets/images/logo/favicon.png')}}">
@stack('style')
</head>

<body class="preload-wrapper">
    <!-- RTL -->
    <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-hover-btn btn-fill">RTL</a>
    <!-- /RTL  -->
    <!-- preload -->
    @include('users.partials.preload')
    <!-- /preload --> 

    <div id="wrapper">
        <!-- Top bar -->
        @yield('topbar')
        <!-- /Top bar -->

        <!-- Header -->
        @include('users.partials.header')
        <!-- /Header -->

        @yield('slider')

        <!-- page-title -->
        @yield('page-title')
        <!-- /page-title -->

        @yield('content')

        <!-- Footer -->
        @include('users.partials.footer')
        <!-- /Footer -->

    </div>

    <!-- gotop -->
    @include('users.partials.goto')
    <!-- /gotop -->
    
    <!-- toolbar-bottom -->
    @include('users.partials.toolbar')
    <!-- /toolbar-bottom -->

    @include('users.partials.md')

    <!-- Javascript -->
    @include('users.partials.script')
    @stack('script')
</body>


<!-- Mirrored from themesflat.co/html/ecomus/home-02.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:42:28 GMT -->
</html>