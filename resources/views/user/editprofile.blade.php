@extends('user.layouts')
@section('profil')

@auth
<div class="btn-group pt-3">
  <button type="button" class="ml-auto btn btn-primary p-2 rounded me-shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Hello, {{ auth()->user()->username }}
  </button>
  <div class="dropdown-menu" style="z-index: -1; margin-top: 0.5px" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item active" href="/profilUser"><span class="icon ion-person"> Account</a>
    <a class="dropdown-item" href="/riwayatbook"><span class="icon ion-document-text"> My Booking</a>
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
        <div class="order-text-book">My Profile</div>
        <div class="bg-confirm">
          @if (session()->has('pesan'))
          <div class="alert alert-success mt-2 alert-dismissible fade show" role="alert">
            {{ session('pesangagal') }} 
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
            <form action="/editProfilUser" method="POST">
              @csrf
                <div class="form-group row">
                  <input type="hidden" name="id" class="form-control" value="{{ Auth()->user()->id }}" id="inputEmail3">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Name</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <input type="text" name="nama" class="form-control" value="{{ Auth()->user()->nama }}" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Email</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" value="{{ Auth()->user()->email }}" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Username</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <input type="text" name="username" value="{{ Auth()->user()->username }}" class="form-control" id="inputEmail3">
                    <input type="hidden" name="password" value="{{ Auth()->user()->password }}" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Phone</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <input type="tel" name="notelp" class="form-control" value="{{ Auth()->user()->notelp }}" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Date of Birth</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <input type="date" name="tgllahir" value="{{ Auth()->user()->tgl_lahir }}" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Address</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <input type="text" name="alamat" value="{{ Auth()->user()->alamat }}" class="form-control" id="inputEmail3">
                    <input type="hidden" name="role" value="{{ Auth()->user()->role }}" class="form-control" id="inputEmail3">
                  </div>
                </div>
            </div>
                <div class="btn-posisi mt-3 p-1">
                    <input type="submit" value="Edit" class="btn btn-success btn-sm" style="float: right; border-radius: 20px;">
                    <a type="submit" class="btn btn-danger btn-sm mr-2" style="float: right; border-radius: 20px;" href="/profilUser">Back</a>
                </div>
            </form>
         
    </div>
@endsection