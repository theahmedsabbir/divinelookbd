@extends('frontend.master')


@push('style')

@endpush


@section('content')

<div class="main-content main-content-login">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb-trail breadcrumbs">
					<ul class="trail-items breadcrumb">
						<li class="trail-item trail-begin">
							<a href="index.html">Home</a>
						</li>
						<li class="trail-item trail-end active">
							Forgot Password
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="site-main">
					<h3 class="custom_blog_title">
						Forgot Password
					</h3>
					<div class="customer_login">
						<div class="row">
							<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-12">

								<div class="login-item">




									<h5 class="title-login">We will send a reset link to your email</h5>
									<form method="POST" action="{{ route('password.email') }}" class="login">
										@csrf

										

					                    @if (session('status'))
					                        <div class="alert alert-success" role="alert">
					                            {{ session('status') }}
					                        </div>
					                    @endif
										
										<p class="form-row form-row-wide">
											<label class="text">Email</label>
											<input title="email" type="email" name="email" value="{{ old('email') }}" class="input-text @error('email') is-invalid @enderror" placeholder="enter your email here" required>

			                                @error('email')
												<p class="text-danger text-left">{{ $errors->first('email') }}</p>
			                                @enderror
{{-- 
											@if ($errors->has('email') && Request::url() == url('/login'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('email') }}</p>
											@endif --}}
										</p>
										<p class="form-row">
											<input type="submit" class="button-submit" value="send">
										</p>
									</form>
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


@push('style')

@endpush





