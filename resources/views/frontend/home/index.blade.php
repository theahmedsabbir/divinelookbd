@extends('frontend.master')


@push('style')
<style type="text/css">
        /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
        .slider-inner{  height: 236px;  }
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {

        .slider-inner{  height: 434px;  }
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {

    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {        
        /*.slider-inner{  height: 611px;  }*/
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
        .slider-inner{  height: 652px;  }
    }
</style>
@endpush


@section('content')
{{-- @dd(Auth::check()) --}}
    <div class="header-device-mobile">
        <div class="wapper">
            <div class="item mobile-logo">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('/frontend/') }}/assets/images/logo.png" alt="img">
                    </a>
                </div>
            </div>
            <div class="item item mobile-search-box has-sub">
                <a href="#">
                    <span class="icon">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="header-searchform-box">
                        <form class="header-searchform">
                            <div class="searchform-wrap">
                                <input type="text" class="search-input" placeholder="Enter keywords to search...">
                                <input type="submit" class="submit button" value="Search">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item mobile-settings-box has-sub">
                <a href="#">
						<span class="icon">
							<i class="fa fa-cog" aria-hidden="true"></i>
						</span>
                </a>
                <div class="block-sub">
                    <a href="#" class="close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                    <div class="block-sub-item">
                        <h5 class="block-item-title">Currency</h5>
                        <form class="currency-form stelina-language">
                            <ul class="stelina-language-wrap">
                                <li class="active">
                                    <a href="#">
                                        <span>
                                            English (USD)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            French (EUR)
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span>
                                            Japanese (JPY)
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item menu-bar">
                <a class=" mobile-navigation  menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="fullwidth-template">
            <div class="home-slider-banner">
                <div class="container">
                    <div class="row10">
                        <div class="col-lg-8 silider-wrapp">
                            <div class="home-slider">
                                <div class="slider-owl owl-slick equal-container nav-center"
                                     data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":false, "dots":true, "infinite":true, "speed":1000, "rows":1}'
                                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>

                                    @foreach (App\Models\Banner::where('type', 'slider')
                                                            ->orderBy('priority', 'asc')
                                                            ->get()
                                     as $slider)

                                     {{-- @dd($slider) --}}

                                    <div class="slider-item style7">
                                        <div class="slider-inner"
                                            style="background-image: url({{ url('banner/' . $slider->image) }}); "
                                        >
                                            <div class="slider-infor">
                                                <h5 class="title-small">
                                                    {!! $slider->info !!}
                                                </h5>
                                                <h3 class="title-big">
                                                    {!! $slider->title !!}
                                                </h3>
                                                <div class="price">
                                                    {!! $slider->sub_title !!}
                                                </div>
                                                <a href="{{ $slider->link }}" class="button btn-shop-the-look bgroud-style">{{ $slider->button_text}}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @php
                            $sideBanners = App\Models\Banner::where('type', 'side-banner')
                                                    ->orderBy('priority', 'asc')
                                                    ->get();
                        @endphp

                        @if ($sideBanners->count() == 2)
                        <div class="col-lg-4 banner-wrapp">
                            @foreach ($sideBanners as $key=> $sideBanner)
                            <div class="banner">
                                <div class="item-banner style7">
                                    <div class="inner"
                                            style="
                                                background-image: url({{ url('banner/' . $sideBanner->image) }});
                                                background-size: cover;

                                            "
                                    >
                                        <div class="banner-content">
                                            <h3 class="title">{!! $sideBanner->title !!}</h3>
                                            <div class="description">
                                                {!! $sideBanner->sub_title !!}
                                            </div>
                                            @if ($key== 1)
                                                <br>
                                            @endif
                                            <a href="{{ $sideBanner->link }}" class="button btn-lets-do-it">{{ $sideBanner->button_text}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- product with filter --}}
            @if ($all_category_products->count() > 0)
            <div class="stelina-tabs  default rows-space-40">
                <div class="container">
                    <div class="tab-head">
                        <ul class="tab-link">
                            @foreach ($all_category_products as $key => $all_category_product)
                                <li class="{{ $key == 0 ? 'active' : '' }}">
                                    <a data-toggle="tab" aria-expanded="true" href="#{{$all_category_product['category']->slug}}">{{$all_category_product['category']->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-container">
                        @foreach ($all_category_products as $key => $all_category_product)
                        <div id="{{$all_category_product['category']->slug}}" class="tab-panel {{ $key == 0 ? 'active' : '' }}">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    @foreach ($all_category_product['products'] as $current_category_product)
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        @include('frontend.product.includes.product-card', ['product' => $current_category_product])
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif



            @php
                $midBanners = App\Models\Banner::where('type', 'mid-banner')
                                        ->orderBy('priority', 'asc')
                                        ->get();
            @endphp

            @if ($midBanners->count() == 2)
            <div class="banner-wrapp">
                <div class="container">
                    <div class="row">
                        @foreach ($midBanners as $key=> $midBanner)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style4">
                                    <div class="inner"

                                            style="
                                                background-image: url({{ url('banner/' . $midBanner->image) }});
                                                background-size: cover;

                                            "
                                    >
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">{!! $midBanner->info !!}</h4>
                                            <h3 class="title">{!! $midBanner->title !!}</h3>
                                            <div class="description">
                                                {!! $midBanner->sub_title !!}
                                            </div>
                                            <a href="{{ $midBanner->link }}" class="button btn-shop-now">{{ $midBanner->button_text}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif


            @php
                $fullBanner = App\Models\Banner::where('type', 'full-banner')
                                        ->first();
            @endphp

            @if ($fullBanner)
            <div class="banner-wrapp rows-space-65">
                <div class="container">
                    <div class="banner">
                        <div class="item-banner style17">
                            <div class="inner">
                                <div class="banner-content">
                                    <h3 class="title">{!! $fullBanner->title !!}</h3>
                                    <div class="description">
                                        {!! $fullBanner->info !!}
                                    </div>
                                    <div class="banner-price">
                                        {!! $fullBanner->sub_title !!}
                                    </div>
                                    <a href="{{ $fullBanner->link }}" class="button btn-shop-now">
                                        {!! $fullBanner->button_text !!}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="product-in-stock-wrapp">
                <div class="container">
                    <h3 class="custommenu-title-blog white">
                        Featured Products
                    </h3>
                    <div class="stelina-product style3">
                        <ul class="row list-products auto-clear equal-container product-grid">
                            @foreach($feature_products as $feature_product)
                                @include('frontend.product.includes.feature-product')
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
