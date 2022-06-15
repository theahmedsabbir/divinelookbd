<!-- ======================= Instagram Feeds ======================== -->

<div class="instagram-wrapp">
    <div>
        <h3 class="custommenu-title-blog">
            <i class="flaticon-instagram" aria-hidden="true"></i>
            Our Latest Feed
        </h3>
        <div class="stelina-instagram">
            <div class="instagram owl-slick equal-container"
                 data-slick='{"autoplay":false, "autoplaySpeed":1000, "arrows":false, "dots":false, "infinite":true, "speed":800, "rows":1}'
                 data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":8}},{"breakpoint":"1200","settings":{"slidesToShow":4}},{"breakpoint":"992","settings":{"slidesToShow":3}},{"breakpoint":"768","settings":{"slidesToShow":2}},{"breakpoint":"481","settings":{"slidesToShow":2}}]'>
                 @foreach (App\Models\Banner::where('type', 'gallery')
                                        ->orderBy('priority', 'asc')
                                        ->get() as $gallery)
                     
                    <div class="item-instagram">
                        <a href="#">
                            <img src="{{ asset('banner/' . $gallery->image ) }}" alt="img">
                        </a>
                        <span class="text">
                            <i class="icon flaticon-instagram" aria-hidden="true"></i>
                        </span>
                    </div>
                 @endforeach
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

<footer class="footer style7">
    <div class="container">
        <div class="container-wapper">
            <div class="row">
                <div class="col-md-3">
                    <div class="stelina-newsletter style1">
                        <div class="newsletter-head">
                            <a href="{{ url('/') }}" class="logo-link">
                                <img src="{{ asset('/frontend/') }}/assets/images/logo-transparent.png" alt="img">
                            </a>
                        </div>
                        <div class="newsletter-form-wrap" style="">
                            <div class="address mt-3" style="text-align: justify;">
                                
                                Road # 02, Gulshan - 1, Dhaka 1212<br>Dhaka Division, Bangladesh
                            </div>
                            <div class="address mt-3" style="text-align: justify;">
                                01708-926171<br>info@divinelookbd.com
                            </div>
                            <div class="address mt-3" style="text-align: justify;">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><a href="https://www.facebook.com/divinelookbangladesh"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="https://twitter.com/DivinelookBD"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.pinterest.com/divinelookbd/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.instagram.com/divinelookbd/"><i class="fa fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.linkedin.com/in/divinelookbd"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="newsletter-head">
                        <p class="text-white footer-custome-font-size">SUPPORTS</p>
                    </div>
                    <ul class="" style="">
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                        <li><a href="{{ url('about') }}">About Page</a></li>
                        @if (Auth::check())
                        <li><a href="{{ url('profile') }}">Profile</a></li>
                            
                        @else


                        <li><a href="{{ url('register') }}">Register</a></li>
                        <li><a href="{{ url('login') }}">Login</a></li>

                        @endif
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Privacy</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <div class="newsletter-head">
                        <p class="text-white footer-custome-font-size">CATEGORIES</p>
                    </div>
                    <ul class="" style="">
                        @foreach (App\Models\Category::inRandomOrder()->take(5)->get() as $category)
                            <li>
                                <a 
                                onclick="document.querySelector('#searchCat' + {{ $category->id }} ).submit()"
                                style="cursor: pointer;"
                                >{{ $category->name }}</a>
                            </li>


                            <form action="{{ url('product/all') }}" id="searchCat{{ $category->id }}" class="d-none">
                                <input type="hidden" name="cat_ids[]" value="{{ $category->id }}">
                            </form>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-2">
                    <div class="newsletter-head">
                        <p class="text-white footer-custome-font-size">BRANDS</p>
                    </div>
                    <ul class="" style="">
                        @foreach (App\Models\Brand::inRandomOrder()->take(5)->get() as $brand)
                            <li>
                                <a 
                                onclick="document.querySelector('#searchBrand' + {{ $brand->id }} ).submit()"
                                style="cursor: pointer;"
                                >{{ $brand->name }}</a>
                            </li>


                            <form action="{{ url('product/all') }}" id="searchBrand{{ $brand->id }}" class="d-none">
                                <input type="hidden" name="brand_ids[]" value="{{ $brand->id }}">
                            </form>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    <div class="stelina-newsletter style1">
                        <div class="newsletter-head">
                            <p class="text-white footer-custome-font-size">SUBSCRIBE</p>
                        </div>
                        <div class="newsletter-form-wrap" style="">
                            <div class="address mt-3" style="">
                                Receive updates, hot deals, discounts sent straignt in your inbox daily
                            </div>
                            <div class="main">
                                <form class="form">
                                  <input type="text" class="form-input" placeholder="type something" style="border-radius: 0px; border: none; background: #424141;"/>
                                  <a href="javascript:void(0);" class="search-button">
                                    <i class="fa fa-long-arrow-right" aria-hidden="true" style="margin-top: 13px; color: white;"></i>
                                  </a>
                                </form>
                              </div>
                            <div class="address mt-3">
                                <h5 class="fs-sm text-light" style="color: white;">Secure Payments</h5>
                                <div class="scr_payment"><img src="./assets/images/card.png" class="img-fluid" alt="" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
