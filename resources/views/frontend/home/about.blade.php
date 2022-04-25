@extends('frontend.master')

@push('style')

@endpush

@section('content')
    <div class="main-content main-content-about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-trail breadcrumbs">
                        <ul class="trail-items breadcrumb">
                            <li class="trail-item trail-begin">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="trail-item trail-end active">
                                About Us
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="content-area content-about col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <h3 class="custom_blog_title">About Us</h3>
                        <div class="page-main-content">
                            <div class="header-banner banner-image">
                                <div class="banner-wrap">
                                    <div class="banner-header">
                                        <div class="col-lg-5 col-md-offset-7">
                                            <div class="content-inner">
                                                <h2 class="title">
                                                    New Collection <br/> for you
                                                </h2>
                                                <div class="sub-title">
                                                    Shop the latest products right <br/>
                                                    We have beard supplies from top brands.
                                                </div>
                                                <a href="{{ url('/') }}" class="stelina-button button">Shop now</a>
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
@endsection

@push('script')

@endpush
