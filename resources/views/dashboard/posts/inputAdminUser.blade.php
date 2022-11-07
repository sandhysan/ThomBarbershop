@extends('dashboard.posts.layoutPost')
@section('konten')
<div class="card-body">
    <h3 class="card-title text-center text-uppercase">Input Data User</h3>
    <div class="row">
      <div class="container">
        <form method="POST" action="/simpanAdminUser" >
            @csrf
            <div class="form-group">
                <label for="menu-title">Name</label>
                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="Your Name">
              </div>
            <div class="form-group">
              <label for="menu-title">Email address</label>
              <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Your Email">
              @error('email')
              <div class="invalid-feedback" style="color: red;">
                  {{ $message }}
              </div>
             @enderror
            </div>
            <div class="form-group">
                <label for="menu-title">Usename</label>
                <input type="text" class="form-control  @error('password') is-invalid @enderror"" name="username" id="usename" aria-describedby="emailHelp" placeholder="Your Username">
                @error('password')
                <div class="invalid-feedback" style="color: red;">
                    {{ $message }}
                </div>
               @enderror
              </div>
            <div class="form-group">
              <label for="menu-title">Password</label>
              <input type="password" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="Your Password">
            </div>
            <div class="form-group">
                <label for="menu-title">Confirm Password</label>
                <input type="password" class="form-control" name="konfirmasi" id="konfirmasi" aria-describedby="emailHelp" placeholder="Confirm Password">
              </div>
            <div class="form-group">
                <label for="menu-title">Phone</label>
                <input type="text" class="form-control" name="notelp" id="notelp" aria-describedby="emailHelp" placeholder="Your Phone">
            </div>
              <div class="form-group">
                <label for="menu-title">Date of Birth</label>
                <input type="date" class="form-control" name="tgllahir" id="tgllahir" aria-describedby="emailHelp">
              </div>
              <div class="form-group">
                <label for="menu-title">Address</label>
                <input type="text" class="form-control" name="alamat" id="alamat" aria-describedby="emailHelp" placeholder="Address">
            </div>
            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
            <a class="btn btn-danger" href="/adminUser">Cancel</a>
          </form>
      </div>
    </div>
    </div>
  </div>

@endsection