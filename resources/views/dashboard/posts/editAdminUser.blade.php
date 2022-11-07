@extends('dashboard.posts.layoutPost')
@section('konten')
<div class="card-body">
    <h3 class="card-title text-center text-uppercase">Edit Data User</h3>
    <div class="row">
      <div class="container">
        <form method="POST" action="/editAdmin">
            @csrf
            <div class="form-group">
              <label for="menu-title">Id</label>
              <input type="text" class="form-control" name="id" id="id" aria-describedby="emailHelp" value="{{ $data->id }}" readonly>
            </div>
            <div class="form-group">
                <label for="menu-title">Name</label>
                <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" value="{{ $data->nama }}">
              </div>
            <div class="form-group">
              <label for="menu-title">Email address</label>
              <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" value="{{ $data->email }}">
              @error('email')
              <div class="invalid-feedback" style="color: red;">
                  {{ $message }}
              </div>
             @enderror
            </div>
            <div class="form-group">
                <label for="menu-title">Username</label>
                <input type="text" class="form-control  @error('password') is-invalid @enderror"" name="username" id="username" aria-describedby="emailHelp" value="{{ $data->username }}">
                @error('password')
                <div class="invalid-feedback" style="color: red;">
                    {{ $message }}
                </div>
               @enderror
              </div>
            <div class="form-group">
              {{-- <label for="menu-title">Password</label> --}}
              <input type="hidden" class="form-control" name="password" id="password" aria-describedby="emailHelp" value="{{ $data->password }}">
            </div>
            <div class="form-group">
                <label for="menu-title">Phone</label>
                <input type="text" class="form-control" name="notelp" id="notelp" aria-describedby="emailHelp" value="{{ $data->notelp }}">
            </div>
              <div class="form-group">
                <label for="menu-title">Date of Birth</label>
                <input type="date" class="form-control" name="tgllahir" id="tgllahir" aria-describedby="emailHelp" value="{{ $data->tgl_lahir }}">
              </div>
              <div class="form-group">
                <label for="menu-title">Address</label>
                <input type="text" class="form-control" width="50" name="alamat" id="alamat" aria-describedby="emailHelp" value="{{ $data->alamat }}">
            </div>
            <div class="form-group">
              <label for="menu-title">Role</label>
              <input type="text" class="form-control" name="role" id="role" aria-describedby="emailHelp" value="{{ $data->role }}" readonly>
          </div>
            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
            <a class="btn btn-danger" href="/adminUser">Cancel</a>
          </form>
          
      </div>
    </div>
    </div>
  </div>

@endsection