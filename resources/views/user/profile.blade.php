@extends('user.layouts')
@section('profil')
@auth
<div class="btn-group pt-3">
  <button type="button" class="ml-auto btn btn-primary p-2 rounded me-shadow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Hello, {{ auth()->user()->username }}
  </button>
  <div class="dropdown-menu" style="z-index: -1; margin-top: 0.5px" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item active" href="profilUser"><span class="icon ion-person"> Account</a>
    <a class="dropdown-item" href="riwayatbook"><span class="icon ion-document-text"> My Booking</a>
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
        <div class="order-text-book">My Profile</div>
        <div class="bg-confirm">
            <form>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Name</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <div type="text" class="form-control border-0" id="inputEmail3">{{ Auth()->user()->nama }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Email</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <div type="text" class="form-control border-0" id="inputEmail3">{{ Auth()->user()->email }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Username</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <div type="text" class="form-control border-0" id="inputEmail3">{{ Auth()->user()->username }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Phone</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <div type="text" class="form-control border-0" id="inputEmail3">{{ Auth()->user()->notelp }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Date of Birth </label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <div type="text" class="form-control border-0" id="inputEmail3">{{ Auth()->user()->tgl_lahir }}</div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Address</label>
                  <p class="col-sm-1" style="font-weight: 500">:</p>
                  <div class="col-sm-8">
                    <div type="text" class="form-control border-0" id="inputEmail3">{{ Auth()->user()->alamat }}</div>
                  </div>
                </div>
              </form>
        </div>
        <div class="btn-posisi mt-3 p-1">
            <a type="button" class="btn btn-success btn-sm mr-2" style="float: right; border-radius: 20px;" href="/editprofil/">Edit Profile</a>
        </div>
         
    </div>
@endsection