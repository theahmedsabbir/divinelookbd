@extends('frontend.master')


@push('style')
<style type="text/css">
	select{
		border-color: rgb(238, 238, 238) !important;
		width: 100%;
	}
</style>
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
							Authentication
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="site-main">
					<h3 class="custom_blog_title">
						Authentication
					</h3>
					<div class="customer_login">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="login-item">
									<h5 class="title-login">Login your Account</h5>
									<form method="POST" action="{{ url('/login') }}" class="login">
										@csrf

										<div class="social-account">
											<h6 class="title-social">Login with social account</h6>
											<a href="{{ url('/auth/google') }}" class="mxh-item facebook">
												<i class="icon fa fa-google-plus-official" aria-hidden="true"></i>
												<span class="text">Google</span>
											</a>
											<a href="#" class="mxh-item twitter">
												<i class="icon fa fa-twitter" aria-hidden="true"></i>
												<span class="text">TWITTER</span>
											</a>
										</div>
										<p class="form-row form-row-wide">
											<label class="text">Email</label>
											<input title="email" type="email" name="email" class="input-text" required>

											@if ($errors->has('email') && Request::url() == url('/login'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('email') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Password</label>
											<input title="password" type="password" name="password" class="input-text" required>

											@if ($errors->has('password') && Request::url() == url('/login'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('password') }}</p>
											@endif
										</p>
										<p class="lost_password">
											<span class="inline">
												<input type="checkbox" id="cb1">
												<label for="cb1" class="label-text">Remember me</label>
											</span>
											<a href="{{ url('password/reset') }}" class="forgot-pw">Forgot password?</a>
										</p>
										<p class="form-row">
											<input type="submit" class="button-submit" value="login">
										</p>
									</form>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="login-item">
									<h5 class="title-login">Register now</h5>
									<form method="POST" action="{{ url('/register') }}" class="register" enctype="multipart/form-data">

										@csrf


										<p class="form-row form-row-wide">
											<label class="text">Your name</label>
											<input title="name" type="text" name="name" class="input-text" required>

											@if ($errors->has('name'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('name') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your email</label>
											<input title="email" type="email" name="email" class="input-text" required>

											@if ($errors->has('email') && Request::url() == url('/register'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('email') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your phone</label>
											<input title="phone" type="text" name="phone" class="input-text" required>


											@if ($errors->has('phone'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('phone') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your password</label>
											<input title="password" type="password" name="password" class="input-text" required>


											@if ($errors->has('password'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('password') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Confirm password</label>
											<input title="password_confirmation" type="password" name="password_confirmation" class="input-text" required>


											@if ($errors->has('password_confirmation'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('password_confirmation') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your address</label>
											<textarea  title="address" type="text" name="address" class="input-text" required></textarea>


											@if ($errors->has('address'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('address') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Division</label>
											<select name="division" id="" class="input-text" required>
												<option value="Dhaka">Dhaka</option>
												<option value="Barishal">Barishal</option>
												<option value="Chattogram">Chattogram</option>
												<option value="Khulna">Khulna</option>
												<option value="Rajshahi">Rajshahi</option>
												<option value="Rangpur">Rangpur</option>
												<option value="Mymensingh">Mymensingh</option>
												<option value="Sylhet">Sylhet</option>
											</select>


											@if ($errors->has('division'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('division') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your photo</label>
											<input title="avatar" type="file" name="avatar" class="input-text">


											@if ($errors->has('avatar'))
												<p class="text-danger text-right text-capitalize">{{ $errors->first('avatar') }}</p>
											@endif
										</p>
										<br>
										<p class="">
											<input type="submit" class="button-submit" value="Register Now">
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





