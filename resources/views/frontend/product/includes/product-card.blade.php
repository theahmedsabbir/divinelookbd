    


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
                            @if (Request::url() == url('product/wishlist'))
                                <a class="wishlist-remove" href="{{ url('product/wishlist/remove/' . $product->slug) }}">Remove from Wishlist</a>
                            @else
                                <a href="{{ url('product/wishlist/add/' . $product->slug) }}">Add to Wishlist</a>
                            @endif
                        </div>
                    </div>
                    {{-- <a href="#" class="button quick-wiew-button">Quick View</a> --}}
                    <div class="loop-form-add-to-cart">
                        <a class="single_add_to_cart_button button"
                            style="cursor: pointer" 
                            onclick="show_animation_add_to_cart({{$product->id}})" 
                            {{-- href="{{ url('order/add-to-cart/' . $product->id ) }}"  --}}
                        >Add to cart
                        </a>

                        <script>
                            function show_animation_add_to_cart(product_id){


                                document.querySelector('.add_to_cart_animation').style.display= 'block';
                                window.location.href= "{{ url('order/add-to-cart/' ) }}/"+product_id;

                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-info">
            <h5 class="product-name product_title">
                <a href="{{ url('/product/details/'. $product->id . '/'. $product->slug) }}">{{ $product->name }}</a>
            </h5>
            <div class="group-info">
                <div class="stars-rating">
                    @php
                        $sum = 0;
                        $ratings = \App\Models\RatingWishlist::with('product')->where('product_id', $product->id)->where('type', 'rating')->get();
                        foreach ($ratings as $rating){
                            $sum += ceil($rating->rating/count($ratings));
                        }
                    @endphp
                    <div class="star-rating">
                        @if($sum > 0)
                        <span class="star-{{ $sum }}"></span>
                        @else
                            <span class="star-5"></span>
                        @endif
                    </div>
                    <div class="count-star">
                        ({{ count($ratings) }})
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
                <button class="single_add_to_cart_button button custom-btn-color" style="margin: 10px auto;"
                    onclick="window.location.href='{{ url('/order/add-to-cart/' . $product->id) }}'" 
                >
                    Add to cart
                </button>
            </div>
        </div>
    </div>
