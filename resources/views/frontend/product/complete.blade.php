@extends('frontend.master')

@section('title')
    Complete
@endsection

@push('style')
    <style>
        .complete{
            font-size: 21px;
            font-weight: 700;
            color: black;
        }
    </style>
@endpush

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
                                Complete order
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <h3 class="custom_blog_title">
                Complete order
            </h3>
            <div class="checkout-wrapp">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <span class="text-center complete">Your order has been completed.Thank you for ordered.</span>
                                        <hr/>
                                        <a href="{{ url('/') }}" class="btn btn-primary" style="background-color: #1D043E">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
