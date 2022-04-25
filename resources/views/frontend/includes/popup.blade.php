

<style>
    h5.modal-title {font-size: 22px;
    font-weight: 500;
    line-height: 1.2;
    /* max-width: 370px; */
    text-transform: capitalize;width: 100%;}

    button.close.text-right {color: #000 !important;opacity: 1;}

    .modal-header {border: none;}

    .modal-header {padding-bottom: 7px;}


    .carousel-caption h3 {color: white;font-size: 34px;background: #0000002b;margin: 0;}

    .carousel-caption p {font-size: 24px;background: #0000002b;padding-bottom: 13px;}
    .modal-body.p-0 {padding: 0 !important;}
    .modal-content {background: transparent !important;}
</style>


<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg" style="width: 75%; height: 75%">
        <div class="modal-content">
{{--             <div class="modal-header">
                <div class="row">
                    <div class="col-md-10">                        
                        <h5 class="modal-title">Welcome to DivineLookBD</h5>
                    </div>
                    <div class="col-md-2">                        
                        <button 
                            type="button" 
                            class="close text-right" 
                            data-dismiss="modal"
                            onclick="" 
                        >&times;</button>
                    </div>
                </div>
            </div> --}}
            <div class="modal-body p-0">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
{{--                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol> --}}

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">

                        @php
                            $popups = App\Models\Banner::where('type','popup')
                                                    ->orderBy('priority', 'asc')
                                                    ->get();
                        @endphp                  

                        @foreach ($popups as $key => $popup)
                        <div class="item 
                            @if ($key == 0)
                                active
                            @endif
                        ">
                            <img src="{{ asset('banner/' . $popup->image) }}" alt="{{ $popup->title }}" style="width:100%;" class="carousel_img">
                            <div class="carousel-caption">
                                @if ($popup->title)
                                    <h3>{{ $popup->title }}</h3>
                                @endif
                                @if ($popup->sub_title)
                                    <p>{{ $popup->sub_title }}</p>
                                @endif
                            </div>
                        </div>
                        @endforeach

{{--                         <div class="item">
                            <img src="{{ asset('/frontend/assets/images/saint.jpg') }}" alt="Chicago" style="width:100%;" class="carousel_img">
                            <div class="overlay"></div>
                            <div class="carousel-caption">
                                <h3>Chicago</h3>
                                <p>Thank you, Chicago!</p>
                            </div>
                        </div>

                        <div class="item">
                            <img src="{{ asset('/frontend/assets/images/bandhorban.jpeg') }}" alt="New York" style="width:100%;" class="carousel_img">
                            <div class="overlay"></div>
                            <div class="carousel-caption">
                                <h3>New York</h3>
                                <p>We love the Big Apple!</p>
                            </div>
                        </div> --}}

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