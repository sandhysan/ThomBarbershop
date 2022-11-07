<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mycss.css') }}"> 
    <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>

    <title>Thom Barbershop | Hairstyle</title>
  </head>
  <body id="hairstyle">
    <div class="container pt-5">
        <div class="mb-5 pb-3">
            <a class="bartext" href="/booking"><i class="bi bi-chevron-double-left"></i>Make an Appointment</a>
            <a href="/"> <img class="navlogo" src="../images/logo-thom-white.png" width="100" alt=""></a>
        </div>
        <div class="row row-cols-1 row-cols-md-3">
        @foreach ($layanan as $key => $item)
            <form action="/book" method="POST">
              @csrf
              <input type="hidden" name="key" value="{{ $key }}">
               <div class="col mb-4">
                  <div class="card test">
                    <img src="{{ url('storage/'.$item->image_lyn) }}" width="200" height="300" class="card-img-top" alt="">
                    <div class="card-body text-center">
                      <h4 class="card-title text-uppercase">{{ $item->nama_lyn }}</h4>
                      <p class="card-text">IDR {{ $item->harga_lyn }}</p> 
                      <button type="submit" name="submit" class="btn btn-sm btn-primary">Choose</button>
                    </div>
                  </div>
                </div>
            </form>
        @endforeach
        </div>
        @if (count($layanan) == 0)
              <div class="not">No Data Available</div>
        @endif
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
    <!-- Optional JavaScript; choose one of the two! -->

    <script>
      function onchangeNamaLayanan(){
        if ($("#namalayanan").val() == '') {
          $("#layanan").val('-');
        } else {
          $("#layanan").val($("#namalayanan option:selected").attr("layanan"));
        }
      }
    </script>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
     
  </body>

  </html>