@extends('dashboard.layouts')
@section('konten')
<div class="container">
    <div class="mt-3 mb-3">
        <h3 style="text-align: center;">My Profile</h3>
    </div>
    
    <div class="bg-profil mb-4">
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
          <a type="button" class="btn btn-success btn-sm" style="border-radius: 20px;" href="/viewProfile">Edit Profile</a>
    </div>
</div>
@endsection