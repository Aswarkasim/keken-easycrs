<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if (Request::is('admin/kelas/create'))
          <form action="/admin/kelas" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/kelas/{{$kelas->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

          <div class="row">

          <div class="col-md-6">
            
            <div class="form-group">
              <label for="">Nama Kelas</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($kelas) ? $kelas->name : old('name')}}" placeholder="Nama Kelas">
               @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Kapsitas (Orang)</label>
              <input type="number" class="form-control  @error('kapasitas') is-invalid @enderror"  name="kapasitas"  value="{{isset($kelas) ? $kelas->kapasitas : old('kapasitas')}}" placeholder="0">
               @error('kapasitas')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Harga</label>
              <input type="number" class="form-control  @error('harga') is-invalid @enderror"  name="harga"  value="{{isset($kelas) ? $kelas->harga : old('harga')}}" placeholder="0.0">
               @error('harga')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Gambar</label>
              <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  value="{{isset($kelas) ? $kelas->cover : old('cover')}}" placeholder="cover">
              {{-- <input type="file" class="form-control  @error('cover') is-invalid @enderror"  name="cover"  placeholder="cover"> --}}
               @error('cover')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
  
              @if (isset($kelas))
                  <img src="/{{$kelas->cover}}" width="100%" class="py-3" alt="">
              @endif
            </div>

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Deskripsi</label>
              <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc" placeholder="Deskripsi Artikel">{{isset($kelas) ? $kelas->desc : old('desc')}}</textarea>
              @error('desc')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>

          </div>
          </div>
         
          
          <a href="/admin/kelas" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>




