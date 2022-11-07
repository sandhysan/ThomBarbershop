@extends('dashboard.layouts')

@section('search')
  <form action="/searchHair" method="get" class="input-group">
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
            <h3 class="card-title mt-2">Table Services</h3>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <a class="btn btn-primary mt-3 mb-1" href="/inputLayanan" role="button">Add Data</a>
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
                  <table id="" class="display table-hover table-bordered expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach ($layanan as $item)
                      <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $item->nama_lyn }}</td>
                        <td><img src="{{ url('storage/'.$item->image_lyn) }}" width="70" alt=""></td>
                        <td>Idr {{ $item->harga_lyn }}</td>
                        <td>
                          <a class="btn btn-success mr-2" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"><i class="ti-eye"></i></a>
                          <a class="btn btn-warning mr-2" href="/viewLayanaan/{{$item->id}}" role="button"><i class="ti-pencil"></i></a>
                          <a class="btn btn-danger" href="/deleteLyn/{{ $item->id }}" role="button"><i class="ti-trash"></i></a>
                        </td>
                      </tr>
                      
                      <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="exampleModalLabel">Service</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Name</label>
                                  <input type="text" class="form-control text-bold" name="" id="" value="{{ $item->nama_lyn }}" readonly>
                                </div>
                                <div class="form-group">
                                  <label for="recipient-picture" class="col-form-label">Picture</label><br>
                                  <img src="{{ url('storage/'.$item->image_lyn) }}" width="200" height="190" alt="">
                                </div>
                                <div class="form-group">
                                  <label for="recipient-price" class="col-form-label">Price</label>
                                  <input type="text" class="form-control text-bold" name="" id="" value="{{ $item->harga_lyn }}" readonly>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div>

                      @endforeach
                      @if (count($layanan) == 0)
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
                <div class="mt-3">{{ $layanan->links() }}</div>
              </div>
            </div>
            </div>
          </div>

          

     
@endsection
