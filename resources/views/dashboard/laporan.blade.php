@extends('dashboard.layouts')
@section('konten')
    <div class="container">
        <div class="card-body">
            <h3 class="card-title mt-2">Report</h3>
                  <button class="btn btn-sm btn-danger p-2 mt-3 mb-2" style="float: right;" data-toggle="modal" data-target="#pdf">PDF <span><i class="ti-printer"></i></span></button>
                  <a class="btn btn-sm btn-success p-2 mt-3 mb-2 mr-2" href="/export" style="float: right;" >Excel <span><i class="ti-printer"></i></span></a>
                  @if (session()->has('pesan'))
                  <div class="alert alert-primary mt-2 alert-dismissible fade show" role="alert">
                    {{ session('pesan') }} 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                  @endif

                  @if (session()->has('pesangagal'))
                  <div class="alert alert-danger mt-2 alert-dismissible fade show" role="alert">
                    {{ session('pesangagal') }} 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                  @endif
            <div class="table-responsive">
                <table class="display table-hover table-bordered expandable-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No. Booking</th>
                            <th>Service</th>
                            <th>Price</th>
                            <th>Customer</th>
                            <th>Booking Date</th>
                            <th>Schedule</th>
                            <th>Employee</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1;?>
                        @foreach ($pemesanan as $item)
                             <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->no_book }}</td>
                                <td>{{ $item->namalyn }}</td>
                                <td>Idr {{ $item->hargalyn  }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->tgl_pesan)) }}</td>
                                <td>{{  date('d-m-Y',strtotime($item->jadwal)) }}&nbsp;{{ $item->jam }}</td>
                                <td>{{ $item->namakywn }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-3">{{ $pemesanan->links() }}</div>
        </div>
        
          <!-- Modal -->
          <div class="modal fade" id="pdf" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Report Income</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                <form action="/printPDF" method="GET">
                    @csrf
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">Start Date</label>
                            <input type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">End Date</label>
                            <input type="date" class="form-control" name="tgl_akhir" id="tgl_awal">
                          </div>
                        </div>
                </div>
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Download PDF</button>
                        </div>
                </form>
              </div>
            </div>
        </div>
        <div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Report Income</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
              <form action="/exportExcel" method="GET">
                  @csrf
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail4">Start Date</label>
                          <input type="date" class="form-control" name="tgl_awal" id="tgl_awal">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4">End Date</label>
                          <input type="date" class="form-control" name="tgl_akhir" id="tgl_awal">
                        </div>
                      </div>
              </div>
                      <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Download Excel</button>
                      </div>
              </form>
            </div>
          </div>
      </div>
    </div>
@endsection