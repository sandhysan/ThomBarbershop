@extends('dashboard.layouts')
@section('konten')
     <!-- partial -->
     <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Wellcome {{ Auth::user()->nama }}</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="images/dashboard/Barber-pana.svg" height="240" alt="people">
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <a style="color: #fff; text-decoration: none;" href="/pemesanan">
                        <p class="mb-4">Pending Bookings</p>
                        <p class="fs-30 mb-2">{{ DB::table('pemesanan')->where('status', 'Pending')->count() }}</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <a style="color: #fff; text-decoration: none;" href="/pemesanan">
                        <p class="mb-4">Confirm Bookings</p>
                        <p class="fs-30 mb-2">{{ DB::table('pemesanan')->where('status', 'Confirmed')->count() }}</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <a style="color: #fff; text-decoration: none;" href="/pemesanan">
                        <p class="mb-4">Completed Bookings</p>
                        <p class="fs-30 mb-2">{{ DB::table('pemesanan')->where('status', 'Completed')->count() }}</p>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <a style="color: #fff; text-decoration: none;" href="/customerUser">
                        <p class="mb-4">Customers</p>
                        <p class="fs-30 mb-2">{{ Auth()->user()->where('role', 'User')->count() }}</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Pending Booking</p>
                  <div class="row">
                    <div class="col-12">
                      <div class="table-responsive">
                        <table id="" class="display table-hover expandable-table" style="width:100%">
                          <thead>
                            <tr>
                              <th>No. Booking</th>
                              <th>Service</th>
                              <th>Price</th>
                              <th>Customer</th>
                              <th>Schedule</th>
                              <th>Employee</th>
                              <th>Status</th>
                              <th>Booking Date</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($pemesanan as $item)
                            <tr>
                              <td>{{ $item->no_book }}</td>
                              <td>{{ $item->namalyn }}</td>
                              <td>Idr{{ $item->hargalyn }}</td>
                              {{-- <td>{{ $item->user->nama }}</td> --}}
                              <td>{{ date('D, d-m-Y',strtotime($item->jadwal)) }}&nbsp;{{ $item->jam }}</td>
                              <td>{{ $item->namakywn }}</td>
                              @if ($item->status=='Pending')
                                <td><span class="badge badge-warning">Pending</span></td>
                              @elseif($item->status=='Confirmed')
                                <td><span class="badge badge-warning">Confirmed</span></td>
                              @elseif($item->status=='Cancel')
                                <td><span class="badge badge-warning">Cancel</span></td>
                              @endif
                              <td>{{ date('d-m-Y',strtotime($item->tgl_pesan)) }}</td>
                            </tr>
                            @endforeach
                            @if (count($pemesanan) == 0)
                            <td colspan="8"><center>No Data Entry</center></td>
                            @endif
                          </tbody>
                      </table>
                      <a class="btn btn-primary btn-sm mt-3" style="float: right;" href="/pemesanan">Updates</a>
                      </div>
                      {{ $pemesanan->links() }}
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Thom Barbershop. <br> Design by <a href="https://www.instagram.com/sandhiputrawan/" target="_blank">Sandhi Putrawan</a></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
@endsection