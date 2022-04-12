@extends('frontend.master')

@section('content')
    <!-- ======================= Main Content ======================== -->

    <div class="main-content main-content-details single no-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="trail-item">
                                <a href="#">{{ $product->brand->name ?? '' }}</a>
                            </li>
                            <li class="trail-item trail-end active">
                                {{ $product->category->name ?? '' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-details full-width col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <div class="details-product">
                            <div class="details-thumd">
                                <div class="image-preview-container image-thick-box image_preview_container">
                                    <img id="img_zoom{{ $product->id }}" data-zoom-image="{{ asset('/product/'.$product->image) }}"
                                         src="{{ asset('/product/'.$product->image) }}" alt="img">
                                    <a href="#" class="btn-zoom open_qv"><i class="fa fa-search" aria-hidden="true"></i></a>
                                </div>

                                <div class="product-preview image-small product_preview">
                                    <div id="thumbnails" class="thumbnails_carousel owl-carousel" data-nav="true"
                                         data-autoplay="false" data-dots="false" data-loop="false" data-margin="10"
                                         data-responsive='{"0":{"items":3},"480":{"items":3},"600":{"items":3},"1000":{"items":3}}'>
                                        @foreach($product->images as $image)
                                            <a href="{{ $image->image }}" data-image="{{ asset('/product/'.$image->image) }}"
                                               data-zoom-image="{{ asset('/product/'.$image->image) }}" class="active">
                                                <img src="{{ asset('/product/'.$image->image) }}"
                                                     data-large-image="{{ asset('/product/'.$image->image) }}" alt="img">
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="details-infor">
                                <h1 class="product-title">
                                    Glorious Eau
                                </h1>
                                <div class="stars-rating">
                                    <div class="star-rating">
                                        <span class="star-5"></span>
                                    </div>
                                    <div class="count-star">
                                        (7)
                                    </div>
                                </div>
                                <div class="availability">
                                    availability:
                                    <a href="#">in Stock</a>
                                </div>
                                <div class="price">
                                    <span>BDT 1000</span>
                                </div>
                                <div class="product-details-description">
                                    <ul>
                                        <li>Vestibulum tortor quam</li>
                                        <li>Imported</li>
                                        <li>Art.No. 06-7680</li>
                                    </ul>
                                </div>
                                <div class="variations">
                                    <div class="attribute attribute_color">
                                        <div class="color-text text-attribute">
                                            Color:
                                        </div>
                                        <div class="list-color list-item">
                                            <a href="#" class="color1"></a>
                                            <a href="#" class="color2"></a>
                                            <a href="#" class="color3 active"></a>
                                            <a href="#" class="color4"></a>
                                        </div>
                                    </div>
                                    <div class="attribute attribute_size">
                                        <div class="size-text text-attribute">
                                            Size:
                                        </div>
                                        <div class="list-size list-item">
                                            <a href="#" class="">xs</a>
                                            <a href="#" class="">s</a>
                                            <a href="#" class="active">m</a>
                                            <a href="#" class="">l</a>
                                            <a href="#" class="">xl</a>
                                            <a href="#" class="">xxl</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button">
                                            <a href="#">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="size-chart-wrapp">
                                        <div class="btn-size-chart">
                                            <a id="size_chart" href="assets/images/size-chart.jpg" class="fancybox">View
                                                Size Chart</a>
                                        </div>
                                    </div>
                                    <div class="quantity-add-to-cart">
                                        <div class="quantity">
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="text" data-step="1" data-min="0" value="1" title="Qty"
                                                       class="input-qty qty" size="4">
                                                <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                                            </div>
                                        </div>
                                        <button class="single_add_to_cart_button button">Add to cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-details-product">
                            <ul class="tab-link">
                                <li class="active">
                                    <a data-toggle="tab" aria-expanded="true" href="#product-descriptions">Descriptions </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" aria-expanded="true" href="#information">Information </a>
                                </li>
                                <li class="">
                                    <a data-toggle="tab" aria-expanded="true" href="#reviews">Reviews</a>
                                </li>
                            </ul>
                            <div class="tab-container">
                                <div id="product-descriptions" class="tab-panel active">
                                    <p>
                                        Quisque quis ipsum venenatis, fermentum ante volutpat, ornare enim.
                                        Phasellus molestie risus non aliquet cursus.
                                        Integer
                                        vestibulum mi lorem, id hendrerit ante lobortis non.
                                        Nunc ante ante, lobortis non pretium non, vulputate vel nisi.
                                        Maecenas dolor elit, fringilla nec turpis ac, auctor vulputate nulla. Phasellus sed
                                        laoreet velit.
                                    </p>
                                    <p>
                                        Proin fringilla urna vel mattis euismod.
                                        Etiam sodales, massa non tincidunt iaculis, mauris libero scelerisque justo, ut
                                        rutrum lectus urna sit amet quam.
                                        Nulla maximus vestibulum mi vitae accumsan.
                                    </p>
                                </div>
                                <div id="information" class="tab-panel">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Size</td>
                                            <td> XS / S / M / L</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>White/ Black/ Teal/ Brown</td>
                                        </tr>
                                        <tr>
                                            <td>Properties</td>
                                            <td>Colorful Dress</td>
                                        </tr>
                                    </table>
                                </div>
                                <div id="reviews" class="tab-panel">
                                    <div class="reviews-tab">
                                        <div class="comments">
                                            <h2 class="reviews-title">
                                                1 review for
                                                <span>Glorious Eau</span>
                                            </h2>
                                            <ol class="commentlist">
                                                <li class="conment">
                                                    <div class="conment-container">
                                                        <a href="#" class="avatar">
                                                            <img src="assets/images/avartar.png" alt="img">
                                                        </a>
                                                        <div class="comment-text">
                                                            <div class="stars-rating">
                                                                <div class="star-rating">
                                                                    <span class="star-5"></span>
                                                                </div>
                                                                <div class="count-star">
                                                                    (1)
                                                                </div>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="author">Cobus Bester</strong>
                                                                <span>-</span>
                                                                <span class="time">June 7, 2013</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Simple and effective design. One of my favorites.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="review_form_wrapper">
                                            <div class="review_form">
                                                <div class="comment-respond">
                                                    <span class="comment-reply-title">Add a review </span>
                                                    <form class="comment-form-review">
                                                        <p class="comment-notes">
                                                            <span class="email-notes">Your email address will not be published.</span>
                                                            Required fields are marked
                                                            <span class="required">*</span>
                                                        </p>
                                                        <div class="comment-form-rating">
                                                            <label>Your rating</label>
                                                            <p class="stars">
                                        						<span>
                                        							<a class="star-1" href="#"></a>
                                        							<a class="star-2" href="#"></a>
                                        							<a class="star-3" href="#"></a>
                                        							<a class="star-4" href="#"></a>
                                        							<a class="star-5" href="#"></a>
                                        						</span>
                                                            </p>
                                                        </div>
                                                        <p class="comment-form-comment">
                                                            <label>
                                                                Your review
                                                                <span class="required">*</span>
                                                            </label>
                                                            <textarea title="review" id="comment" name="comment" cols="45"
                                                                      rows="8"></textarea>
                                                        </p>
                                                        <p class="comment-form-author">
                                                            <label>
                                                                Name
                                                                <span class="">*</span>
                                                            </label>
                                                            <input title="author" id="author" name="author" type="text"
                                                                   value="">
                                                        </p>
                                                        <p class="comment-form-email">
                                                            <label>
                                                                Email
                                                                <span class="">*</span>
                                                            </label>
                                                            <input title="email" id="email" name="email" type="email"
                                                                   value="">
                                                        </p>
                                                        <p class="form-submit">
                                                            <input name="submit" type="submit" id="submit" class="submit"
                                                                   value="Submit">
                                                        </p>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear: left;"></div>
                        <div class="related products product-grid">
                            <h2 class="product-grid-title">You may also like</h2>
                            <div class="owl-products owl-slick equal-container nav-center"  data-slick ='{"autoplay":false, "autoplaySpeed":1000, "arrows":true, "dots":false, "infinite":true, "speed":800, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":3}},{"breakpoint":"1200","settings":{"slidesToShow":2}},{"breakpoint":"992","settings":{"slidesToShow":2}},{"breakpoint":"480","settings":{"slidesToShow":1}}]'>
                                <div class="product-item style-1">
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
                                                    <img src="assets/images/product-item-1.jpg" alt="img">
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
                                                <a href="#">Aluminum Plant</a>
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
                                                        BDT 5000
                                                    </del>
                                                    <ins>
                                                        BDT 1000
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item style-1">
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
                                                    <img src="assets/images/product-item-2.jpg" alt="img">
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
                                                <a href="#">Glorious Eau</a>
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
                                                        BDT 5000
                                                    </del>
                                                    <ins>
                                                        BDT 1000
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item style-1">
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
                                                    <img src="assets/images/product-item-3.jpg" alt="img">
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
                                                <a href="#">Cuerpo Eau</a>
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
                                                        BDT 5000
                                                    </del>
                                                    <ins>
                                                        BDT 1000
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item style-1">
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
                                                    <img src="assets/images/product-item-4.jpg" alt="img">
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
                                                <a href="#">The Alchemist</a>
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
                                                        BDT 5000
                                                    </del>
                                                    <ins>
                                                        BDT 1000
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <img src="assets/images/product-item-black-7.jpg" alt="img">
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
                                        <img src="assets/images/product-item-black-2.jpg" alt="img">
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
                                        <img src="assets/images/product-item-black-3.jpg" alt="img">
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
                                        <img src="assets/images/product-item-black-4.jpg" alt="img">
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
                                        <img src="assets/images/product-item-black-5.jpg" alt="img">
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
                                        <img src="assets/images/product-item-black-6.jpg" alt="img">
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





    <!-- ======================= Footer Global  ======================== -->



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
                            <img src="assets/images/item-instagram-1.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-2.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-3.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-4.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-5.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
			        </span>
                    </div>
                    <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-1.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
                    </span>
                    </div>        <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-2.jpg" alt="img">
                        </a>
                        <span class="text">
                        <i class="icon flaticon-instagram" aria-hidden="true"></i>
                    </span>
                    </div>        <div class="item-instagram">
                        <a href="#">
                            <img src="assets/images/item-instagram-3.jpg" alt="img">
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
                            <span class="text-muted">Capped at BDT 10 per order</span>
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
@endsection
