
<li class="product-item product-type-variable col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-1">
    <div class="product-inner equal-element">
        @if ($product->type)
        <div class="product-top">
            <div class="flash">
					<span class="onnew">
						<span class="text">
							{{ $product->type }}
						</span>
					</span>
            </div>
        </div>
        @endif
        <div class="product-thumb">
            <div class="thumb-inner">
                <a href="{{ url('/product/details/'. $product->id . '/'. $product->slug) }}">
                    <img src="{{ asset('product/' . $product->image) }}" alt="{{ $product->name}}">
                </a>
                <div class="thumb-group">
                    <div class="yith-wcwl-add-to-wishlist">
                        <div class="yith-wcwl-add-button">
                            <a href="#">Add to Wishlist</a>
                        </div>
                    </div>
                    {{-- <a href="#" class="button quick-wiew-button">Quick View</a> --}}
                    <div class="loop-form-add-to-cart">
                        <button class="single_add_to_cart_button button">Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-info">
            <h5 class="product-name product_title">
                <a href="{{ url('/product/details/'. $product->id . '/'. $product->slug) }}">{{ $product->name }}{{ $product->category->name }}{{ $product->brand->name }}</a>
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
                	@if ($product->discount_price)
                    <del>
                        ৳{{ $product->discount_price ?? ''}}
                    </del>
                	@endif
                    <ins>
                        ৳{{ $product->price}}
                    </ins>
                </div>
            </div>
        </div>
    </div>
</li>