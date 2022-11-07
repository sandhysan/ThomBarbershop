@extends('dashboard.layouts')

@section('konten')

          <div class="card-body">
            <h3 class="card-title mt-2">Table Schedules</h3>
            <div class="row">
              <div class="col-12">
                <div class="table-responsive">
                  <a class="btn btn-primary mb-2" data-toggle="modal" data-target="#input">Add Data</a>
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
                  <table id="" class="display table-striped table-bordered expandable-table" style="width:100%">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Time Schedule</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no=1; ?>
                      @foreach ($waktu as $item)
                      <tr>
                        <td scope="row">{{ $no++ }}</td>
                        <td>{{ $item->jam }}</td>
                        <td>
                          {{-- <a class="btn btn-success mr-2" data-toggle="modal" data-target="#exampleModal{{ $item->id }}"><i class="ti-eye"></i></a> --}}
                          <a class="btn btn-warning btn-sm mr-2" data-toggle="modal" data-target="#edit{{ $item->id }}"><i class="ti-pencil"></i></a>
                          {{-- <a class="btn btn-warning mr-2" href="/editJadwal/{{ $item->id }}" role="button"><i class="ti-pencil"></i></a> --}}
                          <a class="btn btn-danger btn-sm" href="/deleteWaktu/{{ $item->id }}" role="button"><i class="ti-trash"></i></a>
                        </td>
                      </tr>

                      {{-- Modal View --}}
                      {{-- <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="exampleModalLabel">Schedule</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="form-group">
                                  <label for="recipient-price" class="col-form-label">Start</label>
                                  <input type="time" class="form-control text-bold" name="" id="" value="{{ $item->hari }}" readonly>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                             
                            </div>
                          </div>
                        </div>
                      </div> --}}

                      {{-- Modal Edit --}}
                      <div class="modal fade" id="edit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title" id="exampleModalLabel">Schedule</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form method="POST" action="/editJam">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="form-group">
                                  <label for="recipient-name" class="col-form-label">Schedule</label>
                                  <input type="time" class="form-control text-bold" name="jam" id="jam" value="{{ $item->jam }}" required>
                                </div>
                                </div>
                                <div class="modal-footer">
                                  <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @if (count($waktu) == 0)
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
              </div>
            </div>
            </div>
          </div>

          {{-- Modal Input --}}
          <div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Add Schedule</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="/simpanWaktu/" >
                    @csrf
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Schedule</label>
                      <input type="time" class="form-control text-bold" name="jam" id="jam" required>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
                      {{-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> --}}
                    </div>
                 </form>
              </div>
            </div>
          </div>
@endsection
