@extends('frontend.master')

@section('title')
    Payment
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
                                Payment
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="custom_blog_title">
                Payment
            </h3>
            <div class="checkout-wrapp">
                <form action="{{ url('/order') }}" method="post">
                    @csrf
                    <div class="shipping-address-form-wrapp">
                        <div class="shipping-address-form  checkout-form">
                            <div class="row-col-1 row-col">
                                <div class="shipping-address">
                                    <h3 class="title-form">
                                        Payment Method
                                    </h3>
                                    <div class="group-button-payment">
                                        <a href="#" class="button btn-credit-card">Cash on delivery</a>
                                        <a href="#" class="button btn-paypal">paypal</a>
                                    </div>
                                    <p class="form-row form-row-card-number">
                                        <label class="text">Transaction no</label>
                                        <input type="text" name="transaction_id" class="input-text" placeholder="xxx - xxx - xxx - xxx" required>
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
                                            <input type="hidden" name="total_qty" value="{{ count($cartProducts) }}" />
                                            <li class="product-item-order">
                                                <div class="product-thumb">
                                                    <a href="#">
                                                        <img src="{{ asset('/product/'.$cartProduct->products->image) }}" alt="img">
                                                    </a>
                                                </div>
                                                <div class="product-order-inner">
                                                    <h5 class="product-name">
                                                        <a href="#">{{ $cartProduct->products->name ?? 'No name found' }}</a>
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
                                            <input type="hidden" name="total_price" value="{{ $sum }}"/>
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
