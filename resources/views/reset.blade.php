<!doctype html>
<html lang="en">
  <head>
  	<title>Thom Barbershop | Reset Password</title>
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

						<div class="img" style="background-image: url(../images/bglogin.jpg);">
							<h3 class="text-center text-white" style="padding-top: 70px; font-weight: 700; text-shadow: 1px 3px 2px 4px">THOM BARBERSHOP</h3>
						</div>
						@if (session()->has('loginError'))
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							{{ session('loginError') }} 
						  </div>
						@endif
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100 text-center">
									<h4 style="font-weight: bold;">Reset</h4>
									<p class="mb-4">Thom Barbershop</p>
								</div>
							</div>
							<form action="/newpass/{{ $email }}" method="post" class="signin-form">
								@csrf
								<div class="form-group">
                                    <input name="password" id="password" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Input New Password</label>
                                    </div>
								<div class="form-group">
                                    <input name="konfirmasi" id="konfirmasi" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Confirm Password</label>
								</div>
								<div class="form-group">
									<button type="submit" class="mb-2 form-control btn btn-custom rounded submit px-3">Save</button>
								</div>
							</form>
							<div class="text-left">
									<label style="color: grey;" class="checkbox-wrap">Show Password<input type="checkbox" name="agree-term" id="agree-term" onclick="showPassword()"/><span class="checkmark"></span>
									</label>
								</div>
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
	var all = document.getElementById('agree-term')
	 var pass = document.getElementById('password')

	 all.addEventListener('click', function() {
		 if (all.checked) {
			 pass.setAttribute('type', 'text')
		 } else {
			 pass.setAttribute('type', 'password')
		 }
	 })
 </script>
  <script>
	 function showPassword() {
		 var user_pass = document.getElementById('konfirmasi');
		 if (user_pass.type == 'password') {
			 user_pass.type = 'text';
		 } else {
			 user_pass.type = 'password';
		 }
	 }
  </script>

	</body>
</html>

