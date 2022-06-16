<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to DivineLook BD!
                </div>
            </div>
            <div class="top-bar-right">

                <div class="dl_socials">
                    <ul class="dl_social_list">
                        <li>
                            <a href="https://www.facebook.com/divinelookbangladesh" class="dl_social-item" target="_blank">
                                <i class="icon fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/DivinelookBD" class="dl_social-item" target="_blank">
                                <i class="icon fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/divinelookbd/" class="dl_social-item" target="_blank">
                                <i class="icon fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="header-user-links">
                    <li>
                        <span class="pipe">|</span>
                        @if (!Auth::check())
                            <a href="{{ url('/login') }}">Login /Register</a>
                        @else
                            <a style="cursor: pointer;" onclick="document.querySelector('#logout').submit()">Log Out</a>
                            <form action="{{ url('logout') }}" id="logout" method="POST" class="d-none">
                                @csrf
                            </form>

                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">



                            {{-- <div id="loading"></div> --}}

            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('/frontend/') }}/assets/images/logo.png" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-8 col-md-5 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form action="{{ url('product/all') }}" class="form-search form-search-width-category">
                            <div class="form-content">

                                <div class="inner">
                                    <input type="text" class="input" name="search" value="{{ Request::get('search') }}" placeholder="Search here">
                                </div>
                                <button class="btn-search custom-btn-color" type="submit">
                                    <span class="icon-search"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-12 col-md-4 col-xs-12 col-ts-12">
                    <div class="header-control">
                        <div class="block-minicart stelina-mini-cart block-header stelina-dropdown">
                            <a href="{{ url('product/wishlist') }}" class="shopcart-icon love-icon" data-stelina="stelina-dropdown">
                                Wishlist
                                <span class="count">
									@if (Auth::check())
                                        {{ Auth::user()->wishlists->count() }}
                                    @else
                                        0
                                    @endif
								</span>
                            </a>
                            <div class="shopcart-description stelina-submenu">
                                <div class="content-wrap">
                                    @if (Auth::check())
                                        <h3 class="title">Wishlist</h3>
                                        <ul class="minicart-items">
                                            @foreach(Auth::user()->wishlists as $wishlist)
                                                @php
                                                    $wishlistProduct = $wishlist->product;
                                                    if($wishlistProduct == null) continue;
                                                @endphp
                                                <li class="product-cart mini_cart_item">
                                                    <a href="#" class="product-media">
                                                        <img src="{{ asset('/product/'.$wishlistProduct->image) }}" alt="img">
                                                    </a>
                                                    <div class="product-details">

                                                        <div class="product-remove">
                                                            <a
                                                                href="{{ url('product/wishlist/remove/' . $wishlistProduct->slug) }}"
                                                            ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                        <h5 class="product-name">
                                                            <a href="#">{{ $wishlistProduct->name ?? '' }}</a>
                                                        </h5>

                                                        <div class="variations text-capitalize">
                                                            <span class="attribute_size">
                                                                <a href="#">{{ $wishlistProduct->brand->name ?? '' }}</a>
                                                            </span>
                                                        </div>
                                                        <span class="product-price">
                                                            <span>BDT {{ $wishlistProduct->price ?? '' }}</span>
                                                        </span>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <br>
                                        <div class="actions">
                                            <a class="button button-viewcart wishlist-login" href="{{ url('product/wishlist') }}">
                                                <span>Go To Wishlist</span>
                                            </a>
                                        </div>

                                    @else
                                        <h3 class="title">Wishlist</h3>
                                        <div class="subtotal">
                                            <span class="total-title">Please login to see your wishlist</span>
                                        </div>
                                        <div class="actions">
                                            <a class="button button-viewcart wishlist-login" href="{{ url('/login') }}">
                                                <span>Login</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="block-minicart stelina-mini-cart block-header stelina-dropdown">


                                {{-- @dd(Session::has('show_cart_animation')) --}}
                            <style>
                                .add_to_cart_animation {
                                    
                                    position: absolute !important;
                                    top: -58%;
                                    right: -16%;
                                    background: white;
                                    z-index: 9999;
                                    /* width: 9%; */
                                    border-radius: 50%;
                                    @if (Session::has('show_cart_animation') && Session::get('show_cart_animation') == true)
                                        display: block;
                                    @else
                                        display: none;
                                    @endif

                                }
                            </style>
                            <img src="{{ asset('order/add_to_cart.gif') }}" class="add_to_cart_animation" alt="">

                            {{-- see script in mobile_header --}}


                            <a href="javascript:void(0);" class="shopcart-icon" data-stelina="stelina-dropdown">
                                Cart
                                <span class="count">
                                    {{ count($productCount) }}
                                </span>
                            </a>
                            <div class="shopcart-description stelina-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Shopping Cart</h3>
                                    <ul class="minicart-items">
                                        @foreach($productCount as $cart)
                                            <li class="product-cart mini_cart_item">
                                                @if ($cart->product)
                                                <a href="#" class="product-media">
                                                    <img src="{{ asset('/product/'.$cart->product->image) }}" alt="img">
                                                </a>
                                                @endif
                                                <div class="product-details">
                                                    <h5 class="product-name">
                                                        <a href="#">{{ $cart->product->name ?? '' }}</a>
                                                        <div class="product-remove">
                                                            <a href="{{ url('/cart/product/delete/'.$cart->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </h5>
                                                    <div class="variations">
                                                        <span class="attribute_color">
                                                            <a href="#">Black</a>
                                                        </span>
                                                        <span class="attribute_size">
                                                            <a href="#">300ml</a>
                                                        </span>
                                                    </div>
                                                    <span class="product-price">
                                                        <span>BDT {{ $cart->price ?? '' }}</span>
                                                    </span>
                                                    <span class="product-quantity">
                                                        ({{ $cart->qty ?? '' }})
                                                    </span>
                                                </div>
                                            </li>
                                            @php
                                                $subtotal = \App\Models\Cart::where('user_id', auth()->check() ? auth()->user()->id : '')
                                                            ->orWhere('ip_address', request()->ip())->sum('total_price');

                                            @endphp
                                        @endforeach
                                    </ul>
                                    <div class="subtotal">
                                        <span class="total-title">Subtotal: </span>
                                        <span class="total-price">
                                            <span class="Price-amount">
                                                BDT {{ $subtotal ?? '00' }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="actions">
                                        <a class="button button-viewcart custom-btn-color" href="{{ url('/shopping/cart') }}">
                                            <span>View Bag</span>
                                        </a>
                                        <a href="{{ url('/shipping') }}" class="button button-checkout custom-btn-color">
                                            <span>Checkout</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-account block-header stelina-dropdown">
                            <a href="javascript:void(0);" data-stelina="stelina-dropdown">
                                <span class="flaticon-user"></span>
                            </a>
                            <div class="header-account stelina-submenu">
                                <div class="header-user-form-tabs">
                                    <ul class="tab-link">
                                        <li class="active">
                                            @if (!Auth::check())
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                            @else
                                                <img src="{{ asset('users/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}" class="img-fluid" style="padding-bottom: 10px;">
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">{{ Auth::user()->name }}</a><br>
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login" style="text-transform: lowercase;">{{ Auth::user()->email }}</a>
                                            @endif
                                        </li>

                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            @if (!Auth::check())

                                                <form method="POST" action="{{ url('/login') }}" class="login form-login">
                                                    @csrf

                                                    <p class="form-row form-row-wide">
                                                        <input type="email" type="email" name="email"
                                                            required placeholder="Email" class="input-text">

                                                        @if ($errors->has('email'))
                                                            <p class="text-danger" style="font-size: 14px;">{{ $errors->first('email') }}</p>
                                                        @endif
                                                    </p>
                                                    <p class="form-row form-row-wide">
                                                        <input type="password" name="password" class="input-text" placeholder="Password" required>

                                                        @if ($errors->has('password'))
                                                            <p class="text-danger" style="font-size: 14px;">{{ $errors->first('password') }}</p>
                                                        @endif
                                                    </p>
                                                    <p class="form-row">
                                                        <label class="form-checkbox">
                                                            <input type="checkbox" class="input-checkbox">
                                                            <span>
                                                                        Remember me
                                                                    </span>
                                                        </label>
                                                        <input type="submit" class="button custom-btn-color" value="Login">
                                                    </p>
                                                    <p class="lost_password">
                                                        <a href="{{ url('password/reset') }}">Lost your password?</a>
                                                    </p>
                                                    <p class="lost_password">
                                                        <a href="{{ url('register') }}" class="">Register here</a>
                                                    </p>
                                                </form>

                                            @else
                                                <div class="actions logged_in_box">
                                                    <a class="button button-viewcart" href="{{ url('profile') }}">
                                                        <span>Account</span>
                                                    </a>
                                                    <a  onclick="document.querySelector('#logout').submit()" style="cursor: pointer;" class="button button-checkout">
                                                        <span>Logout</span>
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form method="post" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="email" placeholder="Email" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="menu-bar mobile-navigation menu-toggle" href="#">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-nav-container rows-space-20">
        <div class="container">
            <div class="header-nav-wapper main-menu-wapper">
                <div class="vertical-wapper block-nav-categori custom-btn-color">
                    <div class="block-title">
							<span class="icon-bar">
								<span></span>
								<span></span>
								<span></span>
							</span>
                        <span class="text">All Categories</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul class="stelina-nav-vertical vertical-menu stelina-clone-mobile-menu">
                            @foreach($categories as $category)
                            <li class="menu-item">
                                <a
                                    onclick="document.querySelector('#search' + {{ $category->id }} ).submit()"
                                    class="stelina-menu-item-title" title="{{ $category->name ?? '#' }}"
                                    style="cursor: pointer;"
                                >
                                    {{ $category->name ?? '#' }}
                                </a>
                                <form action="{{ url('product/all') }}" id="search{{ $category->id }}" class="d-none">
                                    <input type="hidden" name="cat_ids[]" value="{{ $category->id }}">
                                </form>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="header-nav">
                    <div class="container-wapper">
                        <ul class="stelina-clone-mobile-menu stelina-nav main-menu " id="menu-main-menu">
                            <li class="menu-item">
                                <a href="{{ url('/') }}" class="stelina-menu-item-title" title="Home">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('product/all') }}" class="stelina-menu-item-title" title="Shop">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/contact') }}" class="stelina-menu-item-title" title="About">Contact</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ url('/about') }}" class="stelina-menu-item-title" title="About">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div class="header-device-mobile">
    <div class="wapper">
        <div class="item mobile-logo">
            <div class="logo">
                <a href="{{ url('/') }}">
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



        {{-- style for add-to-cart animation mobile  --}}
        <style>         


            .add_to_cart_animation_mobile {
                
                position: absolute !important;
                top: 0%;
                background: white;
                z-index: 9999;
                @if (Session::has('show_cart_animation') && Session::get('show_cart_animation') == true)
                    display: block;
                @else
                    display: none;
                @endif
                
            }

            /* Extra small devices (phones, 450px and down) */
            @media  only screen and (max-width: 359px) {                             
                .add_to_cart_animation_mobile {
                    width: 82%;
                    right: 3%;
                }
            }

            /*360px and up*/
            @media  only screen and (min-width: 360px) {                             
                .add_to_cart_animation_mobile {
                    width: 58%;
                    right: 20%;
                }
            }

            /*450px and up*/
            @media  only screen and (min-width: 450px) {                             
                .add_to_cart_animation_mobile {
                    width: 50%;
                    right: 25%;
                }
            }

            /* Small devices (portrait tablets and large phones, 600px and up) */
            @media  only screen and (min-width: 600px) {                
                .add_to_cart_animation_mobile {
                    width: 37%;
                    right: 32%;
                }
            }

            /* Medium devices (landscape tablets, 768px and up) */
            @media  only screen and (min-width: 768px) {                
                .add_to_cart_animation_mobile {
                    width: 37%;
                    right: 32%;
                }
                
            }

            /* Large devices (laptops/desktops, 992px and up) */
            @media  only screen and (min-width: 992px) {

            }

            /* Extra large devices (large laptops and desktops, 1200px and up) */
            @media  only screen and (min-width: 1200px) {
            }


            .icon2{
                position: relative;
            }
            .count-icon2{
                background-color: #1D043E;
                    width: 20px;
                    height: 20px;
                    text-align: center;
                    line-height: 20px;
                    border-radius: 50%;
                    color: #ffffff;
                    font-weight: 600;
                    display: inline-block;
                    position: absolute;
                    top: 0;
                    right: -10px;
                    font-size: 12px;
            }
            .add_to_cart_animation_mobile_top{
                width: 82%;
                left: 15%;
                top: 21%;
            }

        </style>


        {{-- top mobile cart here --}}
        <div class="item mobile-settings-box" style="position: relative;">

            <img src="{{ asset('order/add_to_cart.gif') }}" class="add_to_cart_animation_mobile add_to_cart_animation_mobile_top" alt="">
            <a href="{{ url('/shopping/cart') }}">
                    <span class="icon icon2">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="count-icon count-icon2">
                            {{ count($productCount) }}
                        </span>
                    </span>
                {{-- <span class="text">Cart</span> --}}
            </a>
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
