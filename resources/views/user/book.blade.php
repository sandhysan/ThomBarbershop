<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Thom Barbershop | Booking</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap3.min.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/stylebook.css')  }}" />
	

    <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="mb-5 pb-5">
					<a href="/"> <img class="navlogo" src="{{ asset('../images/logo-thom.png') }}" width="100" alt=""></a>
					<a class="backtext" href="/"><span class="icon ion-chevron-left"><span class="icon ion-chevron-left">&nbsp;BACK</a>
				</div>
				<div class="container">
					
					<div class="booking-form mb-5">
						@if (session()->has('pesan'))
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong>{{ session('pesan') }}</strong>
						  </div>
						@endif 
						
						<form enctype="multipart/form-data" action="/savebook" method="GET">
							@csrf
							<input type="hidden" class="form-control" name="kd" id="kd" value="{{ 'BOOK-'.$kd }}" readonly>
							<div class="form-group">
								<select class="form-control" name="layanan" id="layanan" onchange="onchangeLayanan()" required>
									<option value="" selected hidden>Choice your favorite haircut</option>
									@foreach ($layanan as $l)
									<option value="{{ $l->id }}" harga="{{ $l->harga_lyn }}" @if($l->id == $style->id) selected="selected" @endif >{{ $l->nama_lyn }}</option>
									@endforeach
								</select>
								<span class="select-arrow"></span>
								<span class="form-label">Hairstyle</span>
							</div>

							<div class="form-group">
								<input class="form-control" name="harga" id="harga" type="text" value="{{ $style->harga_lyn }}" placeholder="Price" readonly required>
								<span class="form-label">Price</span>
							</div>

							<div class="form-group">
								<select class="form-control" name="employee" id="karyawan" required>
									<option  value="" selected hidden>Choice of employee</option>
									@foreach ($karyawan as $k)
									<option value="{{ $k->id }}">{{ $k->nama }}</option>
									@endforeach
								</select>
								<span class="select-arrow"></span>
								<span class="form-label">Employee</span>
							</div>

							<div class="form-group">
								@foreach ($karyawan as $item)
								<div id="show{{ $item->id }}" class="myDiv" style="display: none;">
									<img src="{{ url('storage/'.$item->foto) }}" width="200" alt="">
									<span class="form-label">{{ $item->nama }}</span>
								</div>
								@endforeach 
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input class="form-control" type="date" name="jadwal" id="jadwal" required>
										<span class="form-label">Schedule</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<select class="form-control" name="time" id="time" required>
											<option  value="" selected hidden>Pickup Time</option>Pickup Time
											@foreach ($waktu as $l)
											<option value="{{ $l->jam }}">{{ $l->jam }}</option>
											@endforeach
										</select>
										<span class="select-arrow"></span>
										<span class="form-label">Time</span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<input class="form-control" name="ket" id="ket" type="text" placeholder="Description">
								<span class="form-label">Description</span>
							</div>
							<div class="form-btn">
								<button type="submit" class="submit-btn">Book Now</button>
							</div>
                        </form>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<!-- loader -->
	<div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/magnific-popup-options.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/sscroll.js') }}"></script>

	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

	<script>
		$('.form-control').each(function () {
			floatedLabel($(this));
		});

		$('.form-control').on('input', function () {
			floatedLabel($(this));
		});

		function floatedLabel(input) {
			var $field = input.closest('.form-group');
			if (input.val()) {
				$field.addClass('input-not-empty');
			} else {
				$field.removeClass('input-not-empty');
			}
		}
	</script>
	<script>
		function onchangeLayanan(){
			if ($("#layanan").val() == '') {
				$("#harga").val('0');
			} else {
				$("#harga").val($("#layanan option:selected").attr("harga"));
			}
		}
	</script>
	<script>
		$(document).ready(function(){
		$('#karyawan').on('change', function(){
		var demovalue = $(this).val(); 
		$("div.myDiv").hide();
		$("#show"+demovalue).show();
		});
		});
		</script>
</body>

</html>