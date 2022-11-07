@extends('dashboard.layouts')

@section('search')
  <form action="/searchKaryawan" method="get" class="input-group">
    @csrf
    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
      <button type="submit" class="input-group-text" id="search">
        <i class="icon-search"></i></button>
    </div>
    <input type="text" name="cari" class="form-control" id="navbar-search-input" placeholder="Search Name" aria-label="search" aria-describedby="search">
</form>
@endsection

@section('konten')

          <div class="card-body">
            <h3 class="card-title mt-2">Table Employees</h3>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <a class="btn btn-primary mt-3 mb-1" href="/inputKywnUser" role="button">Add Data</a>
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
                  <table id="" class="display table-warning table-bordered expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Phone</th>
                        <th>Date Of Birth</th>
                        <th>Address</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1;?>
                      @foreach ($karyawan as $item)
                      <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->email }}</td>
                        <td><img src="{{ url('storage/'.$item->foto) }}" width="70" alt=""></td>
                        <td>{{ $item->notelp }}</td>
                        <td>{{ $item->tgl_lahir }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>
                          <a type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop{{ $item->id }}"><i class="ti-eye"></i></a>
                          <a class="btn btn-warning btn-sm" href="/editViewKywn/{{$item->id}}" role="button"><i class="ti-pencil"></i></a>
                          <a class="btn btn-danger btn-sm" href="/deleteKywn/{{ $item->id }}" role="button"><i class="ti-trash"></i></a>
                        </td>
                      </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">View Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <div class="container">
                                  <form>
                                      <div class="form-group">
                                        <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelp" value="{{ $item->id }}" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label for="menu-title">Name</label>
                                          <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ $item->nama }}" readonly>
                                        </div>
                                      <div class="form-group">
                                        <label for="menu-title">Email address</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ $item->email }}" readonly>
                                      </div>
                                      <div class="form-group">
                                        <label for="menu-title">Photo</label>
                                        <img src="{{ url('storage/'.$item->foto) }}" width="200" height="190" alt="">
                                      </div>
                                      <div class="form-group">
                                          <label for="menu-title">Phone</label>
                                          <input type="text" class="form-control" name="notelp" id="notelp" aria-describedby="emailHelp" value="{{ $item->notelp }}" readonly>
                                      </div>
                                        <div class="form-group">
                                          <label for="menu-title">Date of Birth</label>
                                          <input type="date" class="form-control" name="tgllahir" id="tgllahir" aria-describedby="emailHelp" value="{{ $item->tgl_lahir }}" readonly>
                                        </div>
                                        <div class="form-group">
                                          <label for="menu-title">Address</label>
                                          <input type="text" class="form-control" width="50" name="alamat" id="alamat" aria-describedby="emailHelp" value="{{ $item->alamat }}" readonly>
                                      </div>
                                    </form>
                                    
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                      @endforeach
                      @if (count($karyawan) == 0)
                      <div class="alert alert-primary mt-2 alert-dismissible fade show" role="alert">
                       <strong>Data Not Found</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    @endif
                    </tbody>
                </table>
                </div>
                <div class="mt-3"> {{ $karyawan->links() }}</div>
              </div>
            </div>
            </div>
          </div>
@endsection
