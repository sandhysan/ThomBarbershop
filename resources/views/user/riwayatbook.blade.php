@extends('user.layouts')
@section('profil')
@auth
<div class="btn-group pt-3">
  <button type="button" class="ml-auto btn btn-primary p-2 rounded me-shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Hello, {{ auth()->user()->username }}
  </button>
  <div class="dropdown-menu" style="z-index: -1; margin-top: 0.5px" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="profilUser"><span class="icon ion-person"> Account</a>
    <a class="dropdown-item active" href="riwayatbook"><span class="icon ion-document-text"> My Booking</a>
    <a class="dropdown-item" href="jadwal"><span class="icon ion-calendar"> Schedule</a>
    <div class="dropdown-divider"></div>
  <form action="/logout" method="post" class="border-0">
    @csrf
    <button type="submit" class="dropdown-item" style="border: none;"><span class="icon ion-log-in"> Logout</button>
  </form>
  </div>
</div>
@endauth
@endsection

@section('content')

  <div class="container">
      <div class="order-text-book">My Booking</div>
      @if (session()->has('pesan'))
      <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
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
    
      
  <table class="table table-hover table-bordered bg-light me-shadow">
    <thead class="thead-light">
      <tr>
        <th scope="col">Your Name</th>
        <th scope="col">Booking Date</th>
        <th scope="col">Schedule</th>
        <th scope="col">Haircut</th>
        <th scope="col">Price</th>
        <th scope="col">Employee</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dataSQL as $item)
        <tr>
          <td>{{  auth()->user()->nama }}</td>
          <td>{{ $item->tgl_pesan }}</td>
          <td><span class="badge badge-primary">{{date('D, d-m-Y',strtotime($item->jadwal)) }}</span> - <span class="badge badge-info">{{ $item->jam }}</span></td>
          <td>{{ $item->namalyn }}</td>
          <td><span class="badge badge-success">IDR {{ $item->hargalyn }}</span></td>
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
          @if ($item->status=="Pending")
            <button class="btn-warning btn-sm mr-1" role="button" data-toggle="modal" data-target="#editJadwal{{ $item->id }}">Reschedule</button>
            <button class="btn-danger btn-sm" onclick="deleteConfirmation({{ $item->id }})" role="button">Cancel</button>
          @elseif($item->status=="Confirmed")
            <a class="btn-warning btn-sm mr-1 disabled" role="button">Reschedule</a>
            <a class="btn-danger btn-sm disabled" role="button">Cancel</a>
          @elseif($item->status=="Completed")
          <button class="btn-info btn-sm mr-1" role="button" data-toggle="modal" data-target="#viewJadwal{{ $item->id }}">Detail</i></a>
          <button class="btn-secondary btn-sm" onclick="hapusConfirmation({{ $item->id }})" role="button">Delete</button>
          @endif
          </td>
        </tr>

        <!-- Modal Edit-->
        <div class="modal fade" id="editJadwal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reschedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/updateJadwal" method="POST">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">
                    <div class="form-group">
                      <input class="form-control" type="date" name="jadwal" id="jadwal" value="{{ $item->jadwal }}" required>
                    </div>

                  <select class="form-control custom-select" name="jam" required>
                    <option selected>Choose Time</option>
                    @foreach ($dataJam as $row)
                        <option value="{{ $row->jam }}">{{ $row->jam }}</option>
                    @endforeach
                  </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
              </div>
            </form>
            </div>
          </div>
        </div>

            <!-- Modal View-->
            <div class="modal fade" id="viewJadwal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Your Booked</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="container">
                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Name</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3">{{ auth()->user()->nama }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Booking Date</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3">{{ $item->tgl_pesan }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Schedule</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3">{{  $item->jadwal }} - {{ $item->jam }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Haircut</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3">{{ $item->namalyn }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Price</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3"><span class="badge badge-success">IDR {{ $item->hargalyn }}</span></div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Employee</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3">{{ $item->namakywn }}</div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Status</label>
                        <p class="col-sm-1" style="font-weight: 500">:</p>
                        <div class="col-sm-8">
                          <div  class="form-control border-0" id="inputEmail3"><span class="badge badge-info">{{ $item->status }}</span></div>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
    @endforeach
    </tbody>
  </table>
  @if(count($dataSQL)==0)
    <div class="order">
      <a class="text-center order-text" href="/booking">Order More</a>
    </div>
  @endif
  {{ $dataSQL->links() }}
</div>

@endsection

@push('script-cancel')

<script type="text/javascript">
  function deleteConfirmation(id) {
      swal.fire({
          title: "Cancel Order?",
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
                  url: "{{url('cancelBook')}}/" + id,
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
<script type="text/javascript">
  function hapusConfirmation(id) {
      swal.fire({
          title: "Delete this data?",
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
                  url: "{{url('cancelBook')}}/" + id,
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