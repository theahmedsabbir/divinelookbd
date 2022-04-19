<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to our online store!
                </div>
            </div>
            <div class="top-bar-right">

                <div class="dl_socials">
                    <ul class="dl_social_list">
                        <li>
                            <a href="#" class="dl_social-item" target="_blank">
                                <i class="icon fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dl_social-item" target="_blank">
                                <i class="icon fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="dl_social-item" target="_blank">
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
{{--                                 <div class="category">
                                    <select title="cate" data-placeholder="All Categories" class="chosen-select" tabindex="1">
                                        @foreach($categories as $category)
                                        <option value="United States">{{ $category->name ?? 'No Category' }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <div class="inner">
                                    <input type="text" class="input" name="search" value="{{ Request::get('search') }}" placeholder="Search here">
                                </div>
                                <button class="btn-search" type="submit">
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
{{--                                         <div class="subtotal">
                                            <span class="total-title">Go to wishlist</span>
                                        </div> --}}
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
                                        @foreach($productCount as $product)
                                            <li class="product-cart mini_cart_item">
                                                <a href="#" class="product-media">
                                                    <img src="{{ asset('/product/'.$product->products->image) }}" alt="img">
                                                </a>
                                                <div class="product-details">
                                                    <h5 class="product-name">
                                                        <a href="#">{{ $product->name ?? '' }}</a>
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
                                                        <span>BDT {{ $product->price ?? '' }}</span>
                                                    </span>
                                                    <span class="product-quantity">
                                                        ({{ $product->qty ?? '' }})
                                                    </span>
                                                    <div class="product-remove">
                                                        <a href="{{ url('/cart/product/delete/'.$product->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            @php
                                                $subtotal = \App\Models\Cart::where('user_id', auth()->check() ? auth()->user()->id : '')
                                                            ->orWhere('ip_address', request()->ip())->sum('price');

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
                                        <a class="button button-viewcart" href="{{ url('/shopping/cart') }}">
                                            <span>View Bag</span>
                                        </a>
                                        <a href="#" class="button button-checkout">
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
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                        </li>
{{--                                         <li>
                                            <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                        </li> --}}
                                    </ul>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
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
                                                    <input type="submit" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="{{ url('password/reset') }}">Lost your password?</a>
                                                </p>
                                                <p class="lost_password">
                                                    <a href="{{ url('register') }}">Register here</a>
                                                </p>
                                            </form>
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
                <div class="vertical-wapper block-nav-categori">
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
                            <li class="menu-item  menu-item-has-children">
                                <a href="index.html" class="stelina-menu-item-title" title="Home">Home</a>
                                <span class="toggle-submenu"></span>
                                <ul class="submenu">
                                    <li class="menu-item">
                                        <a href="index.html">Home</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="{{ url('product/all') }}" class="stelina-menu-item-title" title="Shop">Shop</a>
                                <span class="toggle-submenu"></span>
                                <ul class="submenu">
                                    <li class="menu-item">
                                        <a href="{{ url('/product/all') }}">Product List</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item  menu-item-has-children item-megamenu">
                                <a href="#" class="stelina-menu-item-title" title="Pages">Pages</a>
                                <span class="toggle-submenu"></span>
                                <div class="submenu mega-menu menu-page">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                            <div class="stelina-custommenu default">
                                                <h2 class="widgettitle">Shop Pages</h2>
                                                <ul class="menu">
                                                    <li class="menu-item">
                                                        <a href="shoppingcart.html">Shopping Cart</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="checkout.html">Checkout</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="contact.html">Contact us</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="404page.html">404</a>
                                                    </li>
                                                    <li class="menu-item">
                                                        <a href="login.html">Login/Register</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                            <div class="stelina-custommenu default">
                                                <h2 class="widgettitle">Product</h2>
                                                <ul class="menu">
                                                    <li class="menu-item">
                                                        <a href="{{ url('product/all') }}">Product List</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="menu-item">
                                <a href="about.html" class="stelina-menu-item-title" title="About">Contact</a>
                            </li>
                            <li class="menu-item">
                                <a href="about.html" class="stelina-menu-item-title" title="About">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
