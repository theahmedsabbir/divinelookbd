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
                                        <tr>
                                            <th width="5%">SL</th>
                                            <th width="15%">Image</th>
                                            <th>Name</th>
                                            <th width="15%">Qty</th>
                                            <th width="10%">Price</th>
                                            <th width="10%">Total Price</th>
                                            <th width="10%">Action</th>
                                        </tr>
                                        <tr>
                                            <td>SL</td>
                                            <td>Image</td>
                                            <td>Name</td>
                                            <td>
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input-group">
                                                                <input type="number" class="form-control" placeholder="qty...">
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-success" type="submit">Go!</button>
                                                                </span>
                                                            </div><!-- /input-group -->
                                                        </div><!-- /.col-lg-6 -->
                                                    </div><!-- /.row -->
                                                </form>
                                            </td>
                                            <td>Price</td>
                                            <td>Total Price</td>
                                            <td>Action</td>
                                        </tr>
                                    </table>
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
