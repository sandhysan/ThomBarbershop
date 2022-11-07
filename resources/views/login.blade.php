<!doctype html>
<html lang="en">
  <head>
  	<title>Thom Barbershop | Sign In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('css/style-login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min-login') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">

						<div class="img" style="background-image: url(images/bglogin.jpg);">
							<h3 class="text-center text-white" style="padding-top: 70px; font-weight: 700; text-shadow: 1px 3px 2px 4px">THOM BARBERSHOP</h3>
						</div>
						@if (session()->has('success'))
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							{{ session('success') }} 
						  </div>
						@endif
						
						@if (session()->has('loginError'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('loginError') }} 
						  </div>
						@endif
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h4  style="font-weight: bold;">Sign In</h4>
									<p class="mb-4">Thom Barbershop</p>
								</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="{{'/auth/redirect'}}" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-google"></span></a>
									</p>
								</div>
							</div>
							<form action="/login" method="post" class="signin-form">
								@csrf
								<div class="form-group mt-3">
									<input type="email" name="email" id="email" class="form-control @error('email')
										is-invalid
									@enderror" autofocus required value="{{ old('email') }}">
									<label class="form-control-placeholder" for="Email">Email</label>
									@error('email')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
								</div>
								<div class="form-group">
								<input type="password" name="password" id="password" class="form-control" required>
								<label class="form-control-placeholder" for="password">Password</label>
								</div>
								<div class="text-left">
									<label style="color: grey;" class="checkbox-wrap">Show Password<input type="checkbox" onclick="showPassword()"><span class="checkmark"></span>
									</label>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-custom rounded submit px-3">Sign In</button>
								</div>
								<div class="text-center">
									<a style="color: grey;" href="/forget">Forgot Password?</a>
								</div>
							</form>
							<p class="text-center mt-3">Not a member? <a data-toggle="tab" class="text-custom" href="/registrasi">Sign Up</a></p>
							<a class="mb-4 text-center" style="color: grey;" href="/">Back to Home</a>
						</div>
		      		</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/popper.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script>
	function showPassword() {
		var user_pass = document.getElementById('password');
		if (user_pass.type == 'password') {
			user_pass.type = 'text';
		} else {
			user_pass.type = 'password';
		}
	}
 </script>

	</body>
</html>

