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
							Update Account
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="site-main">
					<h3 class="custom_blog_title">
						Update Account
					</h3>
					<div class="customer_login">
						<div class="row">
							<div class="col-md-offset-3 col-lg-6 col-md-6 col-sm-12">
								<div class="login-item">
									<h5 class="title-login">Update Information Here</h5>
									<form method="POST" action="{{ url('profile/update') }}" class="register" enctype="multipart/form-data">

										@csrf


										<p class="form-row form-row-wide">
											<label class="text">Your name</label>
											<input title="name" type="text" name="name" value="{{ Auth::user()->name }}" class="input-text" required>

											@if ($errors->has('name'))
												<p class="text-danger">{{ $errors->first('name') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your email</label>
											<input title="email" type="email" name="email" value="{{ Auth::user()->email }}" class="input-text" required>

											@if ($errors->has('email'))
												<p class="text-danger">{{ $errors->first('email') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your phone</label>
											<input title="phone" type="text" name="phone" value="{{ Auth::user()->phone }}" class="input-text" required>


											@if ($errors->has('phone'))
												<p class="text-danger">{{ $errors->first('phone') }}</p>
											@endif
										</p>
{{-- 										<p class="form-row form-row-wide">
											<label class="text">Your password</label>
											<input title="password" type="password" name="password" value="{{ Auth::user()->password }}" class="input-text" required>


											@if ($errors->has('password'))
												<p class="text-danger">{{ $errors->first('password') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Confirm password</label>
											<input title="password_confirmation" type="password" name="password_confirmation" value="{{ Auth::user()->password_confirmation }}" class="input-text" required>


											@if ($errors->has('password_confirmation'))
												<p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
											@endif
										</p> --}}
										<p class="form-row form-row-wide">
											<label class="text">Your address</label>
											<textarea  title="address" type="text" name="address" class="input-text" required>{{ Auth::user()->address }}</textarea>


											@if ($errors->has('address'))
												<p class="text-danger">{{ $errors->first('address') }}</p>
											@endif
										</p>
										<p class="form-row form-row-wide">
											<label class="text">Your photo</label>
											<input title="avatar" type="file" name="avatar" class="input-text">
                                             <img src="{{ asset('users/'.auth()->user()->avatar) }}" height="100" width="100" />
											@if ($errors->has('avatar'))
												<p class="text-danger">{{ $errors->first('avatar') }}</p>
											@endif
										</p>
										<br>
										<p class="">
											<input type="submit" class="button-submit" value="Update">
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





