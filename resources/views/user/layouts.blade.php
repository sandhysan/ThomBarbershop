<!doctype html>
<html lang="en">
  <head>
    <title>Thom Berbershop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 

    <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    
     <!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

    <!-- Theme Style Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  </head>
  <body>

    <header role="banner">
      <nav class="navbar navbar-expand-md navbar-dark bg-light">
        <div class="container">
          <a class="navbar-brand mt-2" href="/"><img src="{{ asset('images/logo-thom.png') }}" width="100px" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse font-weight-bold" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pt-3">
              @auth
              <li class="nav-item">
                <a class="nav-link-2 text-kustom-2" style="text-transform: uppercase;" href="/">Home</a>
              </li>
              {{-- @if(!empty($pesan->where('status', 'Not Confirmed')))
                <li class="nav-item">
                  <div class="nav-link text-kustom disabled" style="text-transform: uppercase;" href="/">Booked</div>
                </li>
              @else --}}
                <li class="nav-item">
                  <a class="nav-link-2 text-kustom-2" style="text-transform: uppercase;" href="/booking">Book</a>
                </li>
              {{-- @endif --}}
              <li class="nav-item">
                <a class="nav-link-2 text-kustom-2" style="text-transform: uppercase;" href="/hair">Hairstyle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link-2 text-kustom-2" style="text-transform: uppercase;" href="/">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link-2 text-kustom-2" style="text-transform: uppercase;" href="#contact">Contact</a>
              </li>
              @endauth

              @guest
              <li>
                <a class="btn btn-primary mt-3 p-2 pl-3 pr-3 rounded" style="text-transform: uppercase;" href="/login">
                  Sign In
                  </a>
              </li>
              @endguest
            </ul>
          </div>
       
          @yield('profil')

        </div>
      </nav>
    </header>
    <!-- END header -->

    <div class="site-content overlay">
      @yield('content')
    </div>
   <!-- END section -->


    <footer class="site-footer" id="contact">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 ">
            <h3 class="mb-4">ADDRESS</h3>
            <p class="mb-4">Giri Kencana Kecamatan Kuta Selatan, Kabupaten Badung, Bali</p>
            <ul class="list-unstyled">
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-location"></span></span><span class=""> Jimbaran, South Kuta, Badung Regency, Bali 80361</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-telephone"></span></span><span class="">+62 821-4696-9147</span></li>
              <li class="d-flex"><span class="mr-3"><span class="icon ion-email"></span></span><span class="">thomassujiwa@gmail.com</span></li>
            </ul>
          </div>
         
          <div class="col-md-4">
            <h3 class="mb-4">Opening Hours</h3>
            <ul class="list-unstyled blog-entry-footer">
              <li><a href="/">
                <h3>Monday</h3>
                <span class="post-meta">10am - 8pm</span>
                </a>
              </li>
              <li><a href="/">
                <h3>Tuesday</h3>
                <span class="post-meta">10am - 8pm</span>
                </a>
              </li>
              <li><a href="/">
                <h3>Wednesday</h3>
                <span class="post-meta">10am - 8pm</span>
                </a>
              </li>
              <li><a href="/y">
                <h3>Friday</h3>
                <span class="post-meta">10am - 8pm</span>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h3>Connect</h3>
            <p>
              <a href="https://www.instagram.com/thomascukur/" target='_blank' class="p-2"><span class="fa fa-instagram"></span> Thom Barbershop </a>
            </p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8400456825216!2d115.16330031478502!3d-8.801093993679148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x153b394ff875bc1!2zOMKwNDgnMDMuOSJTIDExNcKwMDknNTUuOCJF!5e0!3m2!1sen!2sid!4v1655876808180!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-7 text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Thom Barbershop. <br> Design by <a href="https://www.instagram.com/sandhiputrawan/" target="_blank">Sandhi Putrawan</a>

<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </div>
        </div>
      </div>
    </footer>
    <!-- END footer -->
    @stack('script-cancel')
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
   
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

  </body>
</html>