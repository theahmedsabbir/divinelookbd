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
							Reset Password
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="site-main">
					<h3 class="custom_blog_title">
						Reset Password
					</h3>
					<div class="customer_login">
						<div class="row">
							<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-12">

								<div class="login-item">




									<h5 class="title-login">Please enter new password here</h5>
									<form method="POST" action="{{ route('password.update') }}" class="login">
										@csrf
										
                    					<input type="hidden" name="token" value="{{ $token }}">

										<p class="form-row form-row-wide">
											<label class="text">Email</label>
											<input title="email" type="email" name="email" value="{{ $email ?? old('email') }}" class="input-text @error('email') is-invalid @enderror" placeholder="enter your email here" required>

			                                @error('email')
												<p class="text-danger text-left">{{ $message }}</p>
			                                @enderror
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Password</label>
											<input title="password" type="password" name="password" class="input-text @error('password') is-invalid @enderror" required autocomplete="new-password">

                                			@error('password')
												<p class="text-danger text-left">{{ $message }}</p>
                                			@enderror
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Confirm Password</label>
											<input title="password" type="password" name="password_confirmation" class="input-text" required autocomplete="new-password">
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





