<!DOCTYPE html>
<html lang="en">
<head>
    <title>DivineLook - @yield('title')</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('frontend.includes.style')
    @stack('style')
</head>
<body class="home">
<!-- ======================= Header ======================== -->
@include('frontend.includes.header')
<!-- ======================= Customer Features ======================== -->
@yield('content')
<!-- ======================= Customer Features ======================== -->

<!-- ======================= Footer ======================== -->
@include('frontend.includes.footer')
<!-- ======================= Popup ======================== -->
@include('frontend.includes.popup')
<!-- ======================= Mobile header ======================== -->
@include('frontend.includes.mobile_header')
<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>
@include('frontend.includes.script')
@stack('script')
</body>


</html>
