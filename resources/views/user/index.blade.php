<!doctype html>
<html lang="en">
  <head>
    <title>Thom Berbershop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 

    <link rel="icon" type="image/png" href="{{ asset('images/iconbarber.png') }}"/>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">
    

    <!-- Theme Style Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    <header role="banner">
      <nav class="navbar navbar-expand-md navbar-dark bg-light ">
        <div class="container">
          <a class="navbar-brand mt-2" href="/"><img src="{{ asset('images/logo-thom-white.png') }}" width="100px" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse font-weight-bold navbar-light" id="navbarsExample05">
            <ul class="navbar-nav ml-auto pl-lg-5 pl-0 ">
              @auth
              <li class="nav-item ">
                <a class="nav-link text-kustom" style="text-transform: uppercase;" href="/">Home</a>
              </li>
              {{-- @if(!empty($pesan->where('status', 'Not Confirmed')))
                <li class="nav-item">
                  <div class="nav-link text-kustom disabled" style="text-transform: uppercase;" href="/">Booked</div>
                </li>
              @else --}}
                <li class="nav-item">
                  <a class="nav-link text-kustom" style="text-transform: uppercase;" href="/booking">Book</a>
                </li>
              {{-- @endif --}}
             
              <li class="nav-item">
                <a class="nav-link text-kustom" style="text-transform: uppercase;" href="/hair">Hairstyle</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-kustom" style="text-transform: uppercase;" href="#about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-kustom" style="text-transform: uppercase;" href="#contact">Contact</a>
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
       
         
          @auth
          <div class="btn-group">
            <button type="button" class="ml-auto btn btn-primary p-2 rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hello, {{ auth()->user()->username }}
            </button>
            <div class="dropdown-menu" style="z-index: -1; margin-top: 0.5px" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/profilUser"><span class="icon ion-person"> Account</a>
              <a class="dropdown-item" href="/riwayatbook"><span class="icon ion-document-text"> My Booking</a>
                <a class="dropdown-item" href="jadwal"><span class="icon ion-calendar"> Schedule</a>
              <div class="dropdown-divider"></div>
            <form action="/logout" method="post" class="border-0">
              @csrf
              <button type="submit" class="dropdown-item" style="border: none;"><span class="icon ion-log-in"> Logout</button>
            </form>
            </div>
          </div>
          @endauth

        </div>
      </nav>
    </header>
    <!-- END header -->

    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/bgindex.jpg);">
      <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
          <div class="col-md-8 text-center">

            <div class="mb-5 element-animate">
              <img src="{{ asset('images/text-thom-white.png') }}" width="70%" alt="Image placeholder" class="img-md-fluid">
              @auth

              {{-- @if(!empty($pesan))
              <p class="lead mt-3">
                <a class="btn btn-primary btn-lg mt-4 disabled" href="/" role="button">You Already booked</a>
              </p>
              @else --}}
              <p class="lead mt-3">
                <a class="btn btn-primary btn-lg mt-4" href="/booking" role="button">BOOK</a>
              </p>
              {{-- @endif --}}

              @endauth
             
              @guest
              <p class="lead mt-3">
                <a class="btn btn-primary btn-lg mt-4" href="/login" role="button">BOOK</a>
              </p>
              @endguest
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="quick-info element-animate" data-animate-effect="fadeInLeft">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 bgcolor">
            <div class="row">
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-ios-telephone"></span></div>
                  <div class="media-body">
                    <h5>+62 821-4696-9147</h5>
                    <p>Call us, we will get back to you <i class="fa fa-smile-o" aria-hidden="true"></i></p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-location"></span></div>
                  <div class="media-body">
                    <h5>Giri Kencana</h5>
                    <p>South Kuta District, Badung Regency, Bali</p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <div class="media">
                  <div class="mr-3 icon-wrap"><span class="icon ion-android-time"></span></div>
                  <div class="media-body">
                    <h5>Daily: 10 am - 8 pm</h5>
                    <p>Mon-Fri, Sunday <br> Saturday: Closed</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->


    <section class="site-section" id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-4 pr-5">
            
            <h2 class="mb-3">THOM GALLERY</h2>
              <p class="mb-5">Barber is a person whose occupation is mainly to cut dress groom style and shave men's and boys' hair. A barber's place of work is known as a "barbershop" or a "barber's". Barbershops are also places of social interaction and public discourse. In some instances, barbershops are also public forums.</p>
            <div class="mb-3 custom-nav">
              <a href="#" class="btn btn-primary btn-sm custom-prev mr-2 mb-2"><span class="ion-android-arrow-back"></span></a> 
              <a href="#" class="btn btn-primary btn-sm custom-next mr-2 mb-2"><span class="ion-android-arrow-forward"></span></a>
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12 slider-wrap">
                <div class="owl-carousel owl-theme no-nav js-carousel-1">
                  
                  <a href="#" class="img-bg" style="background-image: url('images/org-1.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg" style="background-image: url('images/org-2.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg last" style="background-image: url('images/org-3.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg" style="background-image: url('images/org-4.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg" style="background-image: url('images/org-5.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg last" style="background-image: url('images/org-6.jpg')">
                    <div class="text">
                    </div>
                  </a>
                  <a href="#" class="img-bg" style="background-image: url('images/org-1.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg" style="background-image: url('images/org-2.jpg')">
                    <div class="text">
                    </div>
                  </a>

                  <a href="#" class="img-bg last" style="background-image: url('images/org-3.jpg')">
                    <div class="text">
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center">
            <h2>Barber Features</h2>
            <p>Our barbershop is the territory created purely for males who appreciate
              premium quality, time and flawless look.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">

            <div class="media d-block media-feature text-center">
              <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors-1"></span></div>
              <div class="media-body">
                <h3>Shave &amp; Haircut</h3>
                <p>Barber is a person whose occupation is mainly to cut dress style.</p>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            <div class="media d-block media-feature text-center">
              <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-cream"></span></div>
              <div class="media-body">
                <h3>Cream &amp; Shampoo</h3>
                <p>Barber is a person whose occupation is mainly to cut dress style.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="media d-block media-feature text-center">
              <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-moustache"></span></div>
              <div class="media-body">
                <h3>Mustache Expert</h3>
                <p>Barber is a person whose occupation is mainly to cut dress style.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">

            <div class="media d-block media-feature text-center">
              <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors"></span></div>
              <div class="media-body">
                <h3>Haircut Styler</h3>
                <p>Barber is a person whose occupation is mainly to cut dress style.</p>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            <div class="media d-block media-feature text-center">
              <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-razor"></span></div>
              <div class="media-body">
                <h3>Razor For Beards</h3>
                <p>Barber is a person whose occupation is mainly to cut dress style.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="media d-block media-feature text-center">
              <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-hair-comb"></span></div>
              <div class="media-body">
                <h3>Haircomb</h3>
                <p>Barber is a person whose occupation is mainly to cut dress style.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="section-cover cta" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
      <div class="container">
        <div class="row justify-content-center align-items-center intro">
          <div class="col-md-8 text-center element-animate">
            <h2 class="mb-4">Appoint a Haircut Today and Appear More Confident</h2>
            @guest
              <p><a href="/login" class="btn btn-black">Make an Appointment</a></p>
            @endguest
            @auth     
               <p><a href="/booking" class="btn btn-black">Make an Appointment</a></p>              
            @endauth
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->

    <section class="site-section">
      
    </section>
    <!-- END section -->
    
   
    <footer class="site-footer" id="contact">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4 ">
            <h3 class="mb-4">ADDRESS</h3>
            <p class="mb-4">Giri Kencana, South Kuta District, Badung Regency, Bali</p>
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
              <li><a href="/">
                <h3>Thursday</h3>
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.8400456825216!2d115.16330031478502!3d-8.801093993679148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x153b394ff875bc1!2zOMKwNDgnMDMuOSJTIDExNcKwMDknNTUuOCJF!5e0!3m2!1sen!2sid!4v1666022376216!5m2!1sen!2sid" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
      @auth
          <input type="text" class="d-none" name="" id="harilahir" value="{{ date('d-m', strtotime(auth()->user()->tgl_lahir)) }}">
      @endauth
      
    </footer>
    <!-- END footer -->

    @auth
          <!-- Modal -->
      <div class="modal fade" id="tgl" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header border-0">
              <button type="button" class="close" style="color: red;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <center>
                  <img src="{{ asset('images/ballon.png') }}" width="180" alt="">
                  <h4>Happy Birthday {{ auth()->user()->nama }}</h4>
                  <p>Today is all about you! So, get a special service on a special day!</p>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endauth
    
    
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

    <script>
      $(window).on('load', function() {
        const today = new Date();
        let mm = today.getMonth() + 1;
        let dd = today.getDate(); 
        const tgllahir = $('#harilahir').val()
        if (dd < 10) {
          dd = '0' + dd;
        }
        if (mm <10) {
          mm = '0' + mm;
        } 
        const tglformat = dd + '-' + mm
        console.log(tglformat,tgllahir);
       if (tglformat==tgllahir) {
        $('#tgl').modal('show');
       }
        
      });
    </script>

  </body>
</html>