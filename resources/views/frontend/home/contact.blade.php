@extends('frontend.master')

@push('style')

@endpush


@section('content')

<div class="main-content main-content-contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Contact us
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="content-area content-contact col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="site-main">
                    <h3 class="custom_blog_title">Contact us</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="page-main-content">
        <div class="google-map">


{{--     			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246.46635661222064!2d90.41542565348793!3d23.77761389580101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79c60a8f1d3%3A0x7fddc2d3695ef344!2s3%20A%20Rd%20No%202%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1650905251032!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}


    			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246.46635661222064!2d90.41542565348793!3d23.77761389580101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c79c60a8f1d3%3A0x7fddc2d3695ef344!2s3%20A%20Rd%20No%202%2C%20Dhaka%201212!5e0!3m2!1sen!2sbd!4v1650905251032!5m2!1sen!2sbd&z=1"
                width="100%" height="500"
                id="gmap_canvas"
                frameborder="0"
                scrolling="no"
                marginheight="0" marginwidth="0"
    			></iframe>
{{--
                <iframe src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                width="100%" height="500"
                id="gmap_canvas"
                frameborder="0"
                scrolling="no"
                marginheight="0" marginwidth="0"
                ></iframe> --}}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-contact">
                        <div class="col-lg-8 no-padding">
                            <div class="form-message">
                                <h2 class="title">
                                    Send us a Message!
                                </h2>
                                <form action="#" class="stelina-contact-fom">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Your Name *</span>
                                                <span class="form-control-wrap your-name">
														<input title="your-name" type="text" name="your-name" size="40"
                                                               class="form-control form-control-name">
													</span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
													<span class="form-label">
														Your Email *
													</span>
                                                <span class="form-control-wrap your-email">
														<input title="your-email" type="email" name="your-email" size="40"
                                                               class="form-control form-control-email">
													</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p>
                                                <span class="form-label">Phone</span>
                                                <span class="form-control-wrap your-phone">
														<input title="your-phone" type="text" name="your-phone"
                                                               class="form-control form-control-phone">
													</span>
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <p>
													<span class="form-label">
														Company
													</span>
                                                <span class="form-control-wrap your-company">
														<input title="your-company" type="text" name="your-company"
                                                               class="form-control your-company">
													</span>
                                            </p>
                                        </div>
                                    </div>
                                    <p>
											<span class="form-label">
												Your Message
											</span>
                                        <span class="wpcf7-form-control-wrap your-message">
												<textarea title="your-message" name="your-message" cols="40" rows="9"
                                                          class="form-control your-textarea"></textarea>
											</span>
                                    </p>
                                    <p>
                                        <input type="submit" value="SEND MESSAGE"
                                               class="form-control-submit button-submit">
                                    </p>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 no-padding">
                            <div class="form-contact-information">
                                <form action="#" class="stelina-contact-info">
                                    <h2 class="title">
                                        Contact information
                                    </h2>
                                    <div class="info info_details">
                                        <div class="item address">
												<span class="icon">

												</span>
                                            <span class="text">

													Road # 02, Gulshan - 1, Dhaka 1212 Dhaka, Dhaka Division, Bangladesh
												</span>
                                        </div>
                                        <div class="item phone">
												<span class="icon">

												</span>
                                            <span class="text">
													(+880) 170 8926 171
												</span>
                                        </div>
                                        <div class="item email">
												<span class="icon">

												</span>
                                            <span class="text">
													info@divinelookbd.com
												</span>
                                        </div>
                                    </div>
                                    <div class="socials">
                                        <a href="https://www.facebook.com/divinelookbangladesh" class="social-item" target="_blank">
												<span class="icon fa fa-facebook">

												</span>
                                        </a>
                                        <a href="https://twitter.com/DivinelookBD " class="social-item" target="_blank">
												<span class="icon fa fa-twitter-square">

												</span>
                                        </a>
                                        <a href="https://www.instagram.com/divinelookbd/ " class="social-item" target="_blank">
												<span class="icon fa fa-instagram">

												</span>
                                        </a>
                                    </div>
                                </form>
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
