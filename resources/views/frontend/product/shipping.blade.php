@extends('frontend.master')

@section('title')
    Shipping
@endsection

@section('content')
    <div class="main-content main-content-checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                Checkout
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="custom_blog_title">
                Checkout
            </h3>
            <div class="checkout-wrapp">
                <form action="{{ url('/shipping/store') }}" method="post">
                    @csrf
                    <div class="shipping-address-form-wrapp">
                        <div class="shipping-address-form  checkout-form">
                            <div class="row-col-1 row-col">
                                <div class="shipping-address">
                                    <h3 class="title-form">
                                        Shipping Address
                                    </h3>
                                    <p class="form-row">
                                        <label class="text">Address</label>
                                        <textarea class="form-control" name="address" rows="5">{{ old('address') }}</textarea>
                                    </p>
                                </div>
                            </div>
                            <div class="row-col-2 row-col">
                                <div class="your-order">
                                    <h3 class="title-form">
                                        Your Order
                                    </h3>
                                    @php
                                        $sum = 0;
                                    @endphp
                                    <ul class="list-product-order">
                                        @foreach($cartProducts as $cartProduct)
                                            <li class="product-item-order">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        @if($cartProduct->product)
                                                        <img src="{{ asset('/product/'.$cartProduct->product->image ?? '') }}" alt="img">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product-order-inner">
                                                    <h5 class="product-name">
                                                        <a href="#">{{ $cartProduct->product->name ?? 'No name found' }}</a>
                                                    </h5>
                                                    <span class="attributes-select attributes-color">Black,</span>
                                                    <span class="attributes-select attributes-size">XXL</span>
                                                    <div class="price">
                                                        ৳{{ $cartProduct->price }}
                                                        <span class="count">x{{ $cartProduct->qty }}</span>
                                                    </div>
                                                </div>
                                            </li>
                                            @php
                                                $total = $cartProduct->price*$cartProduct->qty;
                                                $sum = $sum+=$total;
                                            @endphp
                                        @endforeach
                                    </ul>
                                    <div class="order-total">
									<span class="title">
										Total Price:
									</span>
                                        <span class="total-price">
										৳{{ number_format($sum,2) ?? '00' }}
									</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button button-payment">Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
