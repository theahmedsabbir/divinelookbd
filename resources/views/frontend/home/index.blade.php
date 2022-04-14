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
                                    <div class="slider-item style7">
                                        <div class="slider-inner equal-element">
                                            <div class="slider-infor">
                                                <h5 class="title-small">
                                                    Sale up to 40% off!
                                                </h5>
                                                <h3 class="title-big">
                                                    Spring Summer <br/>Collection
                                                </h3>
                                                <div class="price">
                                                    New Price:
                                                    <span class="number-price">
														BDT 270.00
													</span>
                                                </div>
                                                <a href="#" class="button btn-shop-the-look bgroud-style">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item style8">
                                        <div class="slider-inner equal-element">
                                            <div class="slider-infor">
                                                <h5 class="title-small">
                                                    Take A perfume
                                                </h5>
                                                <h3 class="title-big">
                                                    Up to 25% Off <br/>order now
                                                </h3>
                                                <div class="price">
                                                    Save Price:
                                                    <span class="number-price">
														BDT 170.00
													</span>
                                                </div>
                                                <a href="#" class="button btn-shop-product">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-item style9">
                                        <div class="slider-inner equal-element">
                                            <div class="slider-infor">
                                                <h5 class="title-small">
                                                    DivineLook Best Collection
                                                </h5>
                                                <h3 class="title-big">
                                                    A range of <br/>perfume
                                                </h3>
                                                <div class="price">
                                                    New Price:
                                                    <span class="number-price">
														BDT 250.00
													</span>
                                                </div>
                                                <a href="#" class="button btn-chekout">Shop now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 banner-wrapp">
                            <div class="banner">
                                <div class="item-banner style7">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Pick Your <br/>Items</h3>
                                            <div class="description">
                                                Adipiscing elit curabitur senectus sem
                                            </div>
                                            <a href="#" class="button btn-lets-do-it">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="banner">
                                <div class="item-banner style8">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Best Of<br/>Products</h3>
                                            <div class="description">
                                                Cras pulvinar loresum dolor conse
                                            </div>
                                            <span class="price">BDT 379.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="stelina-tabs  default rows-space-40">
                <div class="container">
                    <div class="tab-head">
                        <ul class="tab-link">
                            @foreach($categories as $key => $category)
                                <li class="">
                                    <a data-toggle="tab" aria-expanded="true" href="#{{ $key }}">{{ $category->name ?? '' }}</a>
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
                                                            <a href="#">{{ $product['name'] }}</a>
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
            <div class="banner-wrapp">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style4">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h4 class="stelina-subtitle">TOP STAFF PICK</h4>
                                            <h3 class="title">Best Collection</h3>
                                            <div class="description">
                                                Proin interdum magna primis id consequat
                                            </div>
                                            <a href="#" class="button btn-shop-now">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="banner">
                                <div class="item-banner style5">
                                    <div class="inner">
                                        <div class="banner-content">
                                            <h3 class="title">Maybe You’ve <br/>Earned it</h3>
                                            <span class="code">
												Use code:
												<span>
													DIVINELOOK
												</span>
												Get 25% Off for all items!
											</span>
                                            <a href="#" class="button btn-shop-now">Shop now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-wrapp rows-space-65">
                <div class="container">
                    <div class="banner">
                        <div class="item-banner style17">
                            <div class="inner">
                                <div class="banner-content">
                                    <h3 class="title">Collection Arrived</h3>
                                    <div class="description">
                                        You have no items & Are you <br/>ready to use? come & shop with us!
                                    </div>
                                    <div class="banner-price">
                                        Price from:
                                        <span class="number-price">BDT 45.00</span>
                                    </div>
                                    <a href="#" class="button btn-shop-now">Shop now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                                            <a href="#" tabindex="0">
                                                <img src="{{ asset('/product/'.$feature_product->image) }}" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">{{ $feature_product->name ?? '' }}</a>
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
                                            <button class="add_to_cart_button button" tabindex="0">Shop now</button>
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
