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
                            <li class="active">
                                <a data-toggle="tab" aria-expanded="true" href="#bestseller">Perfume/Fragrance</a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">Classic Saree </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">Ornaments/Jewellery </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#new_arrivals">Foods </a>
                            </li>
                            <li class="">
                                <a data-toggle="tab" aria-expanded="true" href="#top-rated">Beauty Cosmetics</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-container">
                        <div id="bestseller" class="tab-panel active">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-1.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Super Tweeter</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-2.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Auto Accentss</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-3.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Rose Elixir</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-4.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Aoud Queen Roses</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-5.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Series Chrome</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-6.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Shift Knob</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-7.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Tuscan Creations</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-8.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Patiala Eau</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="new_arrivals" class="tab-panel">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-9.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Bal Afrique</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-10.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Exotic Diamond</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-11.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Mon Guerlain </a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-13.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Dainty Diamond</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-14.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Florale</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-15.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">OE Specialty</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-16.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Iridium Spark Plug</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-2.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Ambre Royal</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="top-rated" class="tab-panel">
                            <div class="stelina-product">
                                <ul class="row list-products auto-clear equal-container product-grid">
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-10.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Sport Seats</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-12.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Cross Drilled</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-8.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Big Brake Kit</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-4.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Throttle Bodies</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-9.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Sparta Evolution</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-13.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">Series Slotted</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item product-type-variable col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-16.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#"> Brake Rotors</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                        <div class="product-inner equal-element">
                                            <div class="product-top">
                                                <div class="flash">
                                                    <span class="onnew">
                                                        <span class="text">
                                                            new
                                                        </span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-thumb">
                                                <div class="thumb-inner">
                                                    <a href="#">
                                                        <img src="{{ asset('/frontend/') }}/assets/images/product-item-8.jpg" alt="img">
                                                    </a>
                                                    <div class="thumb-group">
                                                        <div class="yith-wcwl-add-to-wishlist">
                                                            <div class="yith-wcwl-add-button">
                                                                <a href="#">Add to Wishlist</a>
                                                            </div>
                                                        </div>
                                                        <a href="#" class="button quick-wiew-button">Quick View</a>
                                                        <div class="loop-form-add-to-cart">
                                                            <button class="single_add_to_cart_button button">Add to cart
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <h5 class="product-name product_title">
                                                    <a href="#">DRL Bar Headlights</a>
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
                                                        <del>
                                                            BDT 65
                                                        </del>
                                                        <ins>
                                                            BDT 45
                                                        </ins>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                            <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
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
                                                <img src="{{ asset('/frontend/') }}/assets/images/product-item-black-7.jpg" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">Suction Return</a>
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
                                                <span>BDT 375</span>
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
                            <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
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
                                                <img src="{{ asset('/frontend/') }}/assets/images/product-item-black-2.jpg" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">Blowoff Valve Kit</a>
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
                                                <span>BDT 375</span>
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
                            <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
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
                                                <img src="{{ asset('/frontend/') }}/assets/images/product-item-black-3.jpg" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">Attack Stage</a>
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
                                                <span>BDT 375</span>
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
                            <li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-3">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
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
                                                <img src="{{ asset('/frontend/') }}/assets/images/product-item-black-4.jpg" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">Cold Intake System</a>
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
                                                <span>BDT 375</span>
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
                            <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
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
                                                <img src="{{ asset('/frontend/') }}/assets/images/product-item-black-5.jpg" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">Bottle Melody Eau</a>
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
                                                <span>BDT 375</span>
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
                            <li class="product-item style-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12">
                                <div class="product-inner equal-element">
                                    <div class="product-thumb">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
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
                                                <img src="{{ asset('/frontend/') }}/assets/images/product-item-black-6.jpg" alt="img">
                                            </a>
                                        </div>
                                        <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <h5 class="product-name product_title">
                                            <a href="#" tabindex="0">Toyota Switchback</a>
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
                                                <span>BDT 375</span>
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
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- ======================= Customer Features ======================== -->
    <section class="px-0 py-3 br-top">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">Free Shipping</h5>
                            <span class="text-muted">Capped at $10 per order</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">Secure Payments</h5>
                            <span class="text-muted">Up to 6 months installments</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">15-Days Returns</h5>
                            <span class="text-muted">Shop with fully confidence</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">24x7 Fully Support</h5>
                            <span class="text-muted">Get friendly support</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ======================= Customer Features ======================== -->

    <div class="instagram-wrapp">
        <div>
            <h3 class="custommenu-title-blog">
                <i class="flaticon-instagram" aria-hidden="true"></i>
                Instagram Feed
            </h3>
            <div class="stelina-instagram">
                <div class="instagram owl-slick equal-container"
                     data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":false, "infinite":true, "speed":800, "rows":1}'
                     data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":8}},{"breakpoint":"1200","settings":{"slidesToShow":4}},{"breakpoint":"992","settings":{"slidesToShow":3}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":2}}]'>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-1.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-2.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-3.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-4.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-5.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-1.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
                    </span>
                    </div>        <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-2.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
                    </span>
                    </div>        <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('/frontend/') }}/assets/images/item-instagram-3.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======================= Customer Features ======================== -->
    <section class="px-0 py-3 br-top">
        <div class="container">
            <div class="row">

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-shopping-basket"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">Free Shipping</h5>
                            <span class="text-muted">Capped at $10 per order</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">Secure Payments</h5>
                            <span class="text-muted">Up to 6 months installments</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-shield"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">15-Days Returns</h5>
                            <span class="text-muted">Shop with fully confidence</span>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                    <div class="d-flex align-items-center justify-content-start py-2">
                        <div class="d_ico">
                            <i class="fa fa-headphones"></i>
                        </div>
                        <div class="d_capt">
                            <h5 class="mb-0">24x7 Fully Support</h5>
                            <span class="text-muted">Get friendly support</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
