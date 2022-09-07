<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/lowongan/create'))
          <form action="/admin/lowongan" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/lowongan/{{$lowongan->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

          <div class="row">

          <div class="col-md-6">
            <div class="form-group">
              <label for="">Judul</label>
              <input type="text" class="form-control  @error('title') is-invalid @enderror"  name="title"  value="{{isset($lowongan) ? $lowongan->title : old('title')}}" placeholder="Judul">
               @error('title')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Gambar</label>
              <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  value="{{isset($lowongan) ? $lowongan->cover : old('cover')}}" placeholder="cover">
              {{-- <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  placeholder="cover"> --}}
               @error('cover')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
  
              @if (isset($lowongan))
                  <img src="/{{$lowongan->cover}}" width="100%" class="py-3" alt="">
              @endif
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc" placeholder="Deskripsi Artikel">{{isset($lowongan) ? $lowongan->desc : old('desc')}}</textarea>
              @error('desc')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>

          </div>
          </div>
         
          
          <a href="/admin/lowongan" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>




