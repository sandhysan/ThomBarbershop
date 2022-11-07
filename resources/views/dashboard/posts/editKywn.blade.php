@extends('dashboard.posts.layoutPost')
@section('konten')
<div class="card-body">
    <h3 class="card-title text-center text-uppercase">Edit Data User</h3>
    <div class="row">
      <div class="container">
        <form  enctype="multipart/form-data" method="POST" action="/editKywn">
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
              <label for="menu-title">Picture</label>
              <div class="input-group mb-3">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="foto" id="foto" aria-describedby="inputGroupFileAddon01" onchange="previewImage()" value="{{ $data->foto }}">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
            </div>
            @if ($data->foto)
              <div class="form-group">
                <img  src="{{ url('storage/'.$data->foto) }}" class="img-preview img-fluid" width="300">
              </div>
            @else
              <div class="form-group">
                <img class="img-preview img-fluid" width="300">
              </div>
            @endif
            <div class="form-group">
                <label for="menu-title">Phone</label>
                <input type="tel" class="form-control" name="notelp" id="notelp" aria-describedby="emailHelp" value="{{ $data->notelp }}">
            </div>
              <div class="form-group">
                <label for="menu-title">Date of Birth</label>
                <input type="date" class="form-control" name="tgllahir" id="tgllahir" aria-describedby="emailHelp" value="{{ $data->tgl_lahir }}">
              </div>
              <div class="form-group">
                <label for="menu-title">Address</label>
                <input type="text" class="form-control" width="50" name="alamat" id="alamat" aria-describedby="emailHelp" value="{{ $data->alamat }}">
            </div>
            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
            <a class="btn btn-danger" href="/karyawanUser">Cancel</a>
          </form>
          
      </div>
    </div>
    </div>
  </div>

  <script>
    function previewImage() {
      const image = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const ofReader = new FileReader;
      ofReader.readAsDataURL(image.files[0]);

      ofReader.onload = function(ofREvent) {
        imgPreview.src = ofREvent.target.result;
      }
    }
   
  </script>

@endsection