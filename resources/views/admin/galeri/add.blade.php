<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-6">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/galeri/create'))
          <form action="/admin/galeri" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/galeri/{{$galeri->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

          <div class="form-group">
            <label for="">Caption</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($galeri) ? $galeri->name : old('name')}}" placeholder="Caption">
             @error('name')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror
          </div>

          <div class="form-group">
            <label for="">Gambar</label>
            <input type="file" class="form-control  @error('gambar') is-invalid @enderror"  name="gambar"  value="{{isset($galeri) ? $galeri->gambar : old('gambar')}}" placeholder="gambar">
            {{-- <input type="file" class="form-control  @error('gambar') is-invalid @enderror"  name="gambar"  placeholder="gambar"> --}}
             @error('gambar')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
             @enderror

            @if (isset($galeri))
                <img src="/{{$galeri->gambar}}" width="100%" class="py-3" alt="">
            @endif
          </div>

     
          <a href="/admin/galeri" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

