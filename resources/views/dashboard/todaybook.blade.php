@extends('dashboard.layouts')

@section('search')
  <form action="/searchBook" method="get" class="input-group">
    @csrf
    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
      <button type="submit" class="input-group-text" id="search">
        <i class="icon-search"></i></button>
    </div>
    <input type="text" name="cari" class="form-control" id="navbar-search-input" placeholder="Search Name" aria-label="search" aria-describedby="search">
</form>
@endsection

@section('konten')
<div class="container">


          <div class="card-body">
            <h3 class="card-title mt-2">Today Bookings</h3>
            <div class="row">
              <div class="col-12">
                  {{-- <a class="btn btn-primary mt-3 mb-2" href="/inputBook" role="button">Add Booking</a> --}}
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
                  <div  class="table-responsive">
                    <table id="" class="display table-hover table-bordered expandable-table" style="width:100%">
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
                          <th>Status</th>
                          <th>Act.Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1;?>
                        @foreach ($pemesanan as $item)
                        <tr>
                          <td scope="row">{{ $no++ }}</td>
                          <td>{{ $item->no_book }}</td>
                          <td>{{ $item->namalyn }}</td>
                          <td>{{ $item->hargalyn }}</td>
                          <td><a style="text-decoration: none; color: black;" href="/customerUser">{{ $item->user->nama }}</a></td>
                          <td>{{ date('d-m-Y',strtotime($item->tgl_pesan)) }}</td>
                          <td>{{ date('d-m-Y',strtotime($item->jadwal)) }}&nbsp;{{ $item->jam }}</td>
                          <td>{{ $item->namakywn }}</td>
                          @if ($item->status=='Pending')
                            <td><span class="badge badge-warning">Pending</span></td>
                          @elseif($item->status=='Confirmed')
                            <td><span class="badge badge-success">Confirmed</span></td>
                          @elseif($item->status=='Cancel')
                            <td><span class="badge badge-danger">Cancel</span></td>
                          @elseif($item->status=='Completed')
                            <td><span class="badge badge-info">Completed</span></td>
                          @endif
                        
                          <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editbook{{ $item->id }}"><i class="ti-pencil"></i></button>
                          </td>
                          <td>
                            <button type="button" onclick="deleteConfirmation({{ $item->id }})" class="btn btn-danger btn-sm"><i class="ti-trash"></i></button>
                          </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="editbook{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Select Status Booking</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                              <form action="/editStatusToday" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="input-group mb-3">
                                  <select class="custom-select" name="status" id="inputGroupSelect01" required>
                                    <option value="" selected>Choose...</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Confirmed">Confirmed</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Cancel">Cancel</option>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Save changes</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        @if (count($pemesanan) == 0)
                          <td colspan="11"><center>No Data</center></td>
                        @endif
                      </tbody>
                  </table>
                  </div>
                   <div class="mt-3">{{ $pemesanan->links() }}</div>
                </div>
              </div>
            </div>
          </div>
</div>
@endsection

@push('export')
    <script>
      $(document).ready(function() {
    $('#export').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>
@endpush

@push('script-delete')

<script type="text/javascript">
  function deleteConfirmation(id) {
      swal.fire({
          title: "Cancel this booking?",
          icon: 'question',
          text: "Please ensure and then confirm!",
          type: "warning",
          showCancelButton: !0,
          confirmButtonText: "Yes!",
          cancelButtonText: "No!",
          reverseButtons: !0
      }).then(function (e) {

          if (e.value === true) {
              var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

              $.ajax({
                  type: 'POST',
                  url: "{{url('deleteBook')}}/" + id,
                  data: {_token: CSRF_TOKEN},
                  dataType: 'JSON',
                  success: function (results) {
                      if (results.success === true) {
                          swal.fire("Done!", results.message, "success");
                          // refresh page after 2 seconds
                          setTimeout(function(){
                              location.reload();
                          },2000);
                      } else {
                          swal.fire("Error!", results.message, "error");
                      }
                  }
              });

          } else {
              e.dismiss;
          }

      }, function (dismiss) {
          return false;
      })
  }
</script>
@endpush