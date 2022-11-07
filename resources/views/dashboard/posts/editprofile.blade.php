@extends('dashboard.layouts')
@section('konten')
<div class="container">
    <div class="mt-3 mb-3">
        <h3 style="text-align: center;">My Profile</h3>
    </div>
    
    <div class="bg-profil mb-4">
        <form action="/editProfil" method="POST">
          <input type="hidden" name="id" value="{{ Auth()->user()->id }}">
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Name</label>
              <p class="col-sm-1" style="font-weight: 500">:</p>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama" value="{{ Auth()->user()->nama }}" id="nama">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Email</label>
              <p class="col-sm-1" style="font-weight: 500">:</p>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" value="{{ Auth()->user()->email }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Username</label>
              <p class="col-sm-1" style="font-weight: 500">:</p>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="username" name="username" value="{{ Auth()->user()->username }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Phone</label>
              <p class="col-sm-1" style="font-weight: 500">:</p>
              <div class="col-sm-8">
                <input type="tel" class="form-control" name="notelp" id="notelp" value="{{ Auth()->user()->notelp }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Date of Birth </label>
              <p class="col-sm-1" style="font-weight: 500">:</p>
              <div class="col-sm-8">
                <input type="date" class="form-control" name="tgllahir" id="tgllahir" value="{{ Auth()->user()->tgl_lahir }}">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label text-form-con">Address</label>
              <p class="col-sm-1" style="font-weight: 500">:</p>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="alamat" id="alamat" value="{{ Auth()->user()->alamat }}">
              </div>
            </div>
            <button type="submit" class="btn btn-success btn-sm" style="border-radius: 20px;">Save Edit</button>
            <a type="button" class="btn btn-danger btn-sm" style="border-radius: 20px;" href="/viewProfile">Back</a>
          </form>
          
    </div>
</div>
@endsection