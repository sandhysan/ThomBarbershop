@extends('dashboard.posts.layoutPost')
@section('konten')
<div class="card-body">
    <h3 class="card-title text-center text-uppercase">
      Edit Service</h3>
    <div class="row">
      <div class="container">
        <form enctype="multipart/form-data" action="/editlayanan/{{ $data->id }}" method="POST">
          @csrf
          @method('PUT')  
            <div class="form-group">
                <label for="menu-title">Name</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="namalyn" id="namalyn" placeholder="Name" value="{{ $data->nama_lyn }}">
              </div>

              <div class="form-group">
                <label for="menu-title">Picture</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="imagelyn" id="imagelyn" aria-describedby="inputGroupFileAddon01" onchange="previewImage()" value="{{ $data->image_lyn }}">
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                </div>
              </div>
              @if ($data->image_lyn)
                <div class="form-group">
                  <img  src="{{ url('storage/'.$data->image_lyn) }}" class="img-preview img-fluid" width="300">
                </div>
              @else
                <div class="form-group">
                  <img class="img-preview img-fluid" width="300">
                </div>
              @endif
            
              <div class="form-group">
                <label for="menu-title">Price</label>
                <div class="input-group flex-nowrap">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">IDR</span>
                  </div>
                  <input type="text" class="form-control @error('harga') is-invalid @enderror" name="hargalyn" id="hargalyn" value="{{ $data->harga_lyn }}" aria-label="Price" aria-describedby="addon-wrapping" placeholder="Price" required>
                </div>
              </div>
            <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary">
            <a class="btn btn-danger" href="/layanan">Cancel</a>
          </form>
      </div>
    </div>
    </div>
  </div>

  <script>
    function previewImage() {
      const image = document.querySelector('#imagelyn');
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