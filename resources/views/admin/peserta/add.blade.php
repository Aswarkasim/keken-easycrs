<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if($errors->any())
          {!! implode('', $errors->all('<div class="text text-danger">:message</div>')) !!}
      @endif

        @if (Request::is('admin/peserta/create'))
          <form action="/admin/peserta" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/peserta/{{$peserta->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

          <div class="row">

          <div class="col-md-6">
            
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($peserta) ? $peserta->name : old('name')}}" placeholder="Nama Lengkap">
               @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Tempat Lahir</label>
              <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror"  name="tempat_lahir"  value="{{isset($peserta) ? $peserta->tempat_lahir : old('tempat_lahir')}}" placeholder="Tempat Lahir">
               @error('tempat_lahir')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Tanggal Lahir</label>
              <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror"  name="tanggal_lahir"  value="{{isset($peserta) ? $peserta->tanggal_lahir : old('tanggal_lahir')}}" placeholder="Tanggal Lahir">
               @error('tanggal_lahir')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Agama</label>
              <input type="text" class="form-control  @error('agama') is-invalid @enderror"  name="agama"  value="{{isset($peserta) ? $peserta->agama : old('agama')}}" placeholder="Agama">
               @error('agama')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Gender</label>
              <select type="text" class="form-control  @error('gender') is-invalid @enderror"  name="gender"  value="{{isset($peserta) ? $peserta->gender : old('gender')}}" placeholder="Gender">
                <option value="">--Gender--</option>
                <option value="Laki-laki" {{ isset($peserta) ? $peserta->gender == 'Laki-laki' ? : 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ isset($peserta) ? $peserta->gender == 'Perempuan' ? : 'selected' : '' }}>Perempuan</option>
              </select>
               @error('agama')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

           

           

          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" class="form-control  @error('foto') is-invalid @enderror"  name="foto"  value="{{isset($peserta) ? $peserta->foto : old('foto')}}" placeholder="foto">
              {{-- <input type="file" class="form-control  @error('foto') is-invalid @enderror"  name="foto"  placeholder="foto"> --}}
               @error('foto')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
  
              @if (isset($peserta))
                  <img src="/{{$peserta->foto}}" width="100%" class="py-3" alt="">
              @endif
            </div>

            

            <div class="form-group">
              <label for="">Bio</label>
              <textarea class="form-control  @error('bio') is-invalid @enderror" id="summernote"  name="bio" placeholder="Deskripsi Artikel">{{isset($peserta) ? $peserta->bio : old('bio')}}</textarea>
              @error('bio')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>

            <hr>

          </div>
          </div>
         
          
          <a href="/admin/peserta" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>




