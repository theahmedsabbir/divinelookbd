@extends('frontend.master')

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
                                        <div class="slider-inner equal-element"
                                            style="background-image: url({{ url('banner/' . $slider->image) }})"
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
            <div class="stelina-tabs  default rows-space-40">
                <div class="container">
                    <div class="tab-head">
                        <ul class="tab-link">
                            {{-- @dd($categories) --}}
                            @foreach($categories as $key => $category)
                                <li class="">
                                    <a data-toggle="tab" aria-expanded="true" href="#{{ $key }}">{{ $category->name . ' ' . $category->id ?? '' }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="tab-container">
                        @foreach($signal_products as $levelOne => $products)
                                <div id="{{ $levelOne }}" class="tab-panel active">
                                    <div class="stelina-product">
                                        <ul class="row list-products auto-clear equal-container product-grid">
                                        @foreach($products as $levelTwo => $product)
                                            <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">

                                                {{-- @dd(collect($product)) --}}
                                                {{-- @include('frontend.product.includes.product-card', ['product' => collect($product)]) --}}
                                                <div class="product-inner equal-element">
                                                    <div class="product-top">
                                                        <div class="flash">
                                                            <span class="onnew">
                                                                <span class="text">
                                                                    {{ $product['type'] }}
                                                                </span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="product-thumb">
                                                        <div class="thumb-inner">
                                                            <a href="{{ url('/product/details/'.$product['id'].'/'.$product['slug']) }}">
                                                                <img src="{{ asset('/product/'.$product['image']) }}" alt="img">
                                                            </a>
                                                            <div class="thumb-group">
                                                                <div class="yith-wcwl-add-to-wishlist">
                                                                    <div class="yith-wcwl-add-button">
                                                                        <a href="#">Add to Wishlist</a>
                                                                    </div>
                                                                </div>
                                                                <a href="{{ url('/product/details/'.$product['id'].'/'.$product['slug']) }}" class="button quick-wiew-button">Quick View</a>
                                                                <div class="loop-form-add-to-cart">
                                                                    <form action="{{ url('/add/to/card') }}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="product_id" value="{{ $product['id'] }}" />
                                                                        <input type="hidden" name="qty" value="1" />
                                                                        @if($product['discount_price'])
                                                                            <input type="hidden" name="discount_price" value="{{ $product['discount_price'] }}" />
                                                                        @else
                                                                            <input type="hidden" name="price" value="{{ $product['price'] }}" />
                                                                        @endif
                                                                        <button type="submit" class="single_add_to_cart_button button">Add to cart</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <h5 class="product-name product_title">
                                                            <a href="#">{{ $product['name'] . ' ' . $product['cat_id'] }}</a>
                                                        </h5>
                                                        <div class="group-info">
                                                            <div class="stars-rating">
                                                                <div class="star-rating">
                                                                    <span class="star-3"></span>
                                                                </div>
                                                                <div class="count-star">
                                                                    (3)
                                                                </div>
                                                            </div>
                                                            <div class="price">
                                                                @if($product['discount_price'])
                                                                    <del>
                                                                        BDT {{ $product['price'] }}
                                                                    </del>
                                                                    <ins>
                                                                        BDT {{ $product['discount_price'] }}
                                                                    </ins>
                                                                @endif
                                                                @if(!$product['discount_price'])
                                                                    <ins>
                                                                        BDT {{ $product['price'] }}
                                                                    </ins>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>


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
                            <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        {{ $feature_product->type }}
                                                    </span>
                                                </span>
                                            </div>
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <div class="yith-wcwl-add-button">
                                                    <a href="#" tabindex="0">Add to Wishlist</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="thumb-inner">
                                            <a href="{{ url('/product/details/'.$feature_product->id.'/'.$feature_product->slug) }}" tabindex="0">
                                                <img src="{{ asset('/product/'.$feature_product->image) }}" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="{{ url('/product/details/'.$feature_product->id.'/'.$feature_product->slug) }}" tabindex="0">{{ $feature_product->name ?? '' }}</a>
                                        </h5>
                                        <div class="group-info">
                                            <div class="stars-rating">
                                                <div class="star-rating">
                                                    <span class="star-3"></span>
                                                </div>
                                                <div class="count-star">
                                                    (3)
                                                </div>
                                            </div>
                                            <div class="price">
                                                <span>BDT {{ $feature_product->price ?? '' }}</span>
                                            </div>
                                        </div>
                                        <div class="group-buttons">
                                            <div class="quantity">
                                                <div class="control">
                                                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                    <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                           class="input-qty qty" size="4">
                                                    <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                                </div>
                                            </div>
                                            <form action="{{ url('/add/to/card') }}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $feature_product->id }}" />
                                                @if($feature_product->discount_price)
                                                    <input type="hidden" name="discount_price" value="{{ $feature_product->discount_price }}" />
                                                @else
                                                    <input type="hidden" name="price" value="{{ $feature_product->price }}" />
                                                @endif
                                                <button class="add_to_cart_button button" tabindex="0" type="submit">Shop now</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
