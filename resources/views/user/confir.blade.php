<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <title>Thom Barbershop | Confirm Booking</title>

	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/mycss.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>
  
  </head>
  <body>
	<div id="confirm">
		<div class="container">
			<div class="mb-5 pt-4 pb-3">
				<a href="/"> <img class="navlogo" src="{{ asset('../images/logo-thom-white.png') }}" width="100" alt=""></a>
			</div>
      <form action="/confirmbook" method="POST" enctype="multipart/form-data" class="bg-confirm">
        @csrf
        <h4 class="mb-5 text-center" style="font-weight: 700">Detail Booking</h4>
        <input type="hidden" name="id" class="form-control" id="inputEmail3" value="{{ auth()->user()->id }}" required>
        <input type="hidden" class="form-control" name="kd" id="kd" value="{{ $kd }}" readonly>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Name</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <div  class="form-control border-0" id="inputEmail3">{{ auth()->user()->nama }}</div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Email</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <div  class="form-control border-0" id="inputEmail3">{{ auth()->user()->email }}</div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Phone</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <div  class="form-control border-0" id="inputEmail3">{{ auth()->user()->notelp }}</div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Booking Date</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <div  class="form-control border-0" id="inputEmail3">{{ $tglpesan }}</div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Schedule</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <input type="date" name="jadwal" class="form-control border-0" style="background: white;" id="inputEmail3" value="{{ $jadwal }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Time Schedule</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <input type="time" name="time" style="background: white;" class="form-control border-0" id="inputEmail3" value="{{ $time }}" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Haircut</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <input type="text" style="background: white;" name="layanan"   
            @foreach($style as $item1)
             @if ($item1->id == $rambut)
              value="{{ $item1->nama_lyn }}" 
            @endif
            @endforeach class="form-control border-0" id="inputEmail3" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Price</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <input type="text" name="harga" style="background: white;" value="{{ $harga }}" class="form-control border-0" id="inputEmail3" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Employee</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <input type="text" name="employee" style="background: white;"
            @foreach ($emplyd as $item1)
              @if ($item1->id == $pekerja)
                value="{{ $item1->nama }}" 
              @endif
            @endforeach class="form-control border-0" id="inputEmail3" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Description</label>
          <p class="col-sm-1" style="font-weight: 500">:</p>
          <div class="col-sm-8">
            <input type="text" name="ket" style="background: white;" value="{{ $ket }}" class="form-control border-0" id="inputEmail3" readonly>
          </div>
        </div>
        <div class="form-group form-check" style="font-size: 14px; margin-left: 20px;">
          <input type="checkbox" class="form-check-input" id="" required>
          <label class="form-check-label" for="">I Accept <a type="button" class="hovers" data-toggle="modal" data-target="#staticBackdrop" href="">Terms and Conditions</a> Thom Barbershop</label>
        </div>
        <div class="form-group" style="margin-top: -10px">
          <button type="submit" class="btn btn-primary" style="border-radius: 30px; width: 100%">CONFIRM BOOKING</button>
        </div>
      </form>
	</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" >
    <div class="modal-content" style="border: 3px solid black;">
      <div class="modal-header border-0">
        <button type="button" class="close" style="color: red;" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <h5>Terms & Condition Booking</h5>
          <p>1. &nbsp; Booking appointments only through the website.</p>
          <p>2. &nbsp; Bookings can be made for other people. (Booking can be more than one)</p>
          <p>3. &nbsp; Customers can cancel before admin confirms the booking.</p>
          <p>4. &nbsp; Cancellation can be done independently via the web or assisted by telephone.</p>
          <p>5. &nbsp; Cancellation made less than 3 hours before the appointment or do not show up at the appointment time will be marked.</p>
          <p>6. &nbsp; Rescheduling can be done before the admin confirms the booking.</p>
          <p>7. &nbsp; 10 minute delay tolerance. (It is recommended that customers arrive 5/10 minutes early)</p>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>