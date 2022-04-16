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

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg" style="width: 100%; height: 100%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Welcome to Divinlook</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        <div class="item active">
                            <img src="{{ asset('/frontend/assets/images/royel2.jpg') }}" alt="Los Angeles" style="width:100%;">
                            <div class="carousel-caption">
                                <h3>Los Angeles</h3>
                                <p>LA is always so much fun!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ asset('/frontend/assets/images/saint.jpg') }}" alt="Chicago" style="width:100%;">
                            <div class="carousel-caption">
                                <h3>Chicago</h3>
                                <p>Thank you, Chicago!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ asset('/frontend/assets/images/bandhorban.jpeg') }}" alt="New York" style="width:100%;">
                            <div class="carousel-caption">
                                <h3>New York</h3>
                                <p>We love the Big Apple!</p>
                            </div>
                        </div>

                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ======================= Mobile header ======================== -->
@include('frontend.includes.mobile_header')
<a href="#" class="backtotop">
    <i class="fa fa-angle-double-up"></i>
</a>
@include('frontend.includes.script')
@stack('script')
<script>
    $(window).on('load',function(){
        // $('#myModal').modal('show');
    });
</script>
</body>


</html>
