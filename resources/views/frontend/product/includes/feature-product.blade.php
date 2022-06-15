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
            {{-- <a href="#" class="button quick-wiew-button" tabindex="0">Quick View</a> --}}
        </div>
        <div class="product-info">
            <h5 class="product-name product_title">
                <a href="{{ url('/product/details/'.$feature_product->id.'/'.$feature_product->slug) }}" tabindex="0">{{ $feature_product->name ?? '' }}</a>
            </h5>
            <div class="group-info">
                <div class="stars-rating">
                    @php
                        $sum = 0;
                        $ratings = \App\Models\RatingWishlist::with('product')->where('product_id', $feature_product->id)->where('type', 'rating')->get();
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
                    <input type="hidden" name="qty" value="1" />
                    @if($feature_product->discount_price)
                        <input type="hidden" name="discount_price" value="{{ $feature_product->discount_price }}" />
                    @else
                        <input type="hidden" name="price" value="{{ $feature_product->price }}" />
                    @endif
                    <button class="add_to_cart_button button custom-btn-color" tabindex="0" type="submit">Shop now</button>
                </form>
            </div>
        </div>
    </div>
</li>
