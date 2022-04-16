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
                                    <table class="table">
                                        <tr style="background-color: #1D043E">
                                            <th width="5%">SL</th>
                                            <th width="15%">Image</th>
                                            <th>Name</th>
                                            <th width="15%">Qty</th>
                                            <th width="10%">Price</th>
                                            <th width="10%">Total Price</th>
                                            <th width="5%">Action</th>
                                        </tr>
                                        @foreach($cartProducts as $cartProduct)
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td>
                                                <img src="{{ asset('/product/'.$cartProduct->products->image) }}" height="80" width="80" />
                                            </td>
                                            <td>{{ $cartProduct->products->name ?? '' }}</td>
                                            <td>
                                                <form action="{{ url('/cart/update/'.$cartProduct->id) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="number" name="qty" value="{{ $cartProduct->qty }}" class="form-control" placeholder="qty...">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="submit">Update</button>
                                                                </span>
                                                            </div><!-- /input-group -->
                                                        </div><!-- /.col-lg-6 -->
                                                    </div><!-- /.row -->
                                                </form>
                                            </td>
                                            <td>৳ {{ $cartProduct->price }}</td>
                                            <td>৳ {{ $cartProduct->price*$cartProduct->qty }}</td>
                                            <td>
                                                <a href="" class="btn btn-sm btn-danger text-center">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="coupon">
                                                    <label class="coupon_code">Coupon Code:</label>
                                                    <input type="text" class="input-text" placeholder="Promotion code here">
                                                    <a href="#" class="button">Coupon</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="order-total" style="float: right">
                                                    <span class="title">
                                                        Total Price:
                                                    </span>
                                                    <span class="total-price">
															$95
													</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-cart">
                                    <button class="button btn-continue-shopping">
                                        Continue Shopping
                                    </button>
                                    <button class="button btn-cart-to-checkout">
                                        Checkout
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
