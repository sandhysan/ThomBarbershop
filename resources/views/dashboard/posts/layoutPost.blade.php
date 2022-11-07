<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- csrf-token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Dashboard ThomBarbershop</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('../vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('../vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('../vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('../vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('../js/select.dataTables.min.css') }}">
  <link rel="stylesheet" href="text/css" href="{{ asset('../vendors/mdi/css/materialdesignicons.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('../css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="icon" type="image/png" href="{{ asset('../images/iconbarber.png') }}"/>
   <!-- SweetAlert2 -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="/dashboard"><img src="{{ asset('../images/logobg.png') }}" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src="{{ asset('../images/iconbarber.png') }}"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            @yield('search')
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <p class="nav-link" style="font-size: 18px; margin-top: 8px; margin-right: 5px;"> {{ Auth::user()->username }}</p>
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown" style="font-size: 27px">
              <i class="ti-user mx-0"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item"  href="/profilAdmin/">
                <i class="ti-settings text-primary"></i>
                Edit Account
              </a>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">
                  <i class="ti-power-off text-primary"></i>
                  Logout
                </button>
              </form>
            </div>
          </li>
        </ul>
       
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="/dashboard">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="charts">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/customerUser">Customer</a></li>
                <li class="nav-item"> <a class="nav-link" href="/adminUser">Admin</a></li>
                <li class="nav-item"> <a class="nav-link" href="/karyawanUser">Employee</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#booking" aria-expanded="false" aria-controls="auth">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Booking Menu</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="booking">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/todaybook">Today Book</a></li>
                <li class="nav-item"> <a class="nav-link" href="/pemesanan">Booking</a></li>
                <li class="nav-item"> <a class="nav-link" href="/layanan">Service</a></li>
                <li class="nav-item"> <a class="nav-link" href="/report">Report</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#schedule" aria-expanded="false" aria-controls="auth">
              <i class="icon-clock menu-icon"></i>
              <span class="menu-title">Schedule</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="schedule">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="/waktu">Time Schedule</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      
      @yield('konten')
     
    </div>
    <!-- page-body-wrapper ends -->
   
  </div>
  <!-- container-scroller -->
  @stack('script-delete')
  <!-- plugins:js -->
  <script src="{{ asset('../vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('../vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('../vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('../vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset('../js2/dataTables.select.min.js') }}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('../js2/off-canvas.js') }}"></script>
  <script src="{{ asset('../js2/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('../js2/template.js') }}"></script>
  <script src="{{ asset('../js2/settings.js') }}"></script>
  <script src="{{ asset('../js2/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('../js2/dashboard.js') }}"></script>
  <script src="{{ asset('../js2/Chart.roundedBarCharts.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>

