@extends('frontend.master')

@section('title')
    Shopping cart
@endsection

@section('content')
    <div class="site-content">
        <main class="site-main  main-container no-sidebar">
            <div class="container">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{ url('/') }}">
								<span>
									Home
								</span>
                            </a>
                        </li>
                        <li class="trail-item trail-end active">
							<span>
								Shopping Cart
							</span>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class="main-content-cart main-content col-sm-12">
                        <h3 class="custom_blog_title">
                            Shopping Cart
                        </h3>
                        <div class="page-main-content">
                            <div class="shoppingcart-content">
                                <div class="col-md-12">
                                    <table class="table table-responsive">
                                        <tr class="custom-btn-color">
                                            <th width="5%" style="color: white;">SL</th>
                                            <th width="15%" style="color: white;">Image</th>
                                            <th style="color: white;">Name</th>
                                            <th width="15%" style="color: white;">Qty</th>
                                            <th width="10%" style="color: white;">Price</th>
                                            <th width="10%" style="color: white;">Total Price</th>
                                            <th width="5%" style="color: white;">Action</th>
                                        </tr>
                                        @php
                                            $sum = 0;
                                        @endphp
                                        @foreach($cartProducts as $cartProduct)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <img src="{{ asset('/product/'.$cartProduct->product->image) }}" height="80" width="80" />
                                            </td>
                                            <td>{{ $cartProduct->product->name ?? '' }}</td>
                                            <td>
                                                <form action="{{ url('/cart/update/'.$cartProduct->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="number" name="qty" value="{{ $cartProduct->qty }}" class="form-control" placeholder="qty...">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success custom-btn-color" type="submit">Update</button>
                                                                </span>
                                                            </div><!-- /input-group -->
                                                        </div><!-- /.col-lg-6 -->
                                                    </div><!-- /.row -->
                                                </form>
                                            </td>
                                            <td>৳ {{ $cartProduct->price }}</td>
                                            <td>৳ {{ $total = $cartProduct->price*$cartProduct->qty }}</td>
                                            <td>
                                                <a href="{{ url('/cart/product/delete/'.$cartProduct->id) }}" class="btn btn-sm btn-danger text-center">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                            @php
                                                $sum = $sum+=$total;
                                            @endphp
                                        @endforeach
                                    </table>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="coupon">
                                                    <label class="coupon_code">Coupon Code:</label>
                                                    <input type="text" class="input-text" placeholder="Promotion code here">
                                                    <a href="#" class="button custom-btn-color">Coupon</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="order-total" style="float: right">
                                                    <span class="title">
                                                        Total Price:
                                                    </span>
                                                    <span class="total-price">
															৳ {{ number_format($sum,2) ?? '00' }}
													</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-cart">
                                    <a href="{{ url('/') }}" class="button btn-continue-shopping custom-btn-color">
                                        Continue Shopping
                                    </a>
                                    @if(auth()->check())
                                        <a href="{{ url('/shipping') }}" class="button btn-cart-to-checkout custom-btn-color">
                                            Checkout
                                        </a>
                                    @else
                                        <a href="{{ url('/login') }}" class="button btn-cart-to-checkout custom-btn-color">
                                            Checkout
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
