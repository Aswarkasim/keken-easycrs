<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">

        @if($errors->any())
          {!! implode('', $errors->all('<div class="text text-danger">:message</div>')) !!}
      @endif

        @if (Request::is('admin/pengajar/create'))
          <form action="/admin/pengajar" method="POST" enctype="multipart/form-data">  
        @else
          <form action="/admin/pengajar/{{$pengajar->id}}" method="POST" enctype="multipart/form-data">  
            @method('PUT')
        @endif
          @csrf

          <div class="row">

          <div class="col-md-6">
            
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control  @error('name') is-invalid @enderror"  name="name"  value="{{isset($pengajar) ? $pengajar->name : old('name')}}" placeholder="Nama Lengkap">
               @error('name')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Tempat Lahir</label>
              <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror"  name="tempat_lahir"  value="{{isset($pengajar) ? $pengajar->tempat_lahir : old('tempat_lahir')}}" placeholder="Tempat Lahir">
               @error('tempat_lahir')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Tanggal Lahir</label>
              <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror"  name="tanggal_lahir"  value="{{isset($pengajar) ? $pengajar->tanggal_lahir : old('tanggal_lahir')}}" placeholder="Tanggal Lahir">
               @error('tanggal_lahir')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Agama</label>
              <input type="text" class="form-control  @error('agama') is-invalid @enderror"  name="agama"  value="{{isset($pengajar) ? $pengajar->agama : old('agama')}}" placeholder="Agama">
               @error('agama')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Gender</label>
              <select type="text" class="form-control  @error('gender') is-invalid @enderror"  name="gender"  value="{{isset($pengajar) ? $pengajar->gender : old('gender')}}" placeholder="Gender">
                <option value="">--Gender--</option>
                <option value="Laki-laki" {{ isset($pengajar) ? $pengajar->gender == 'Laki-laki' ? : 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ isset($pengajar) ? $pengajar->gender == 'Perempuan' ? : 'selected' : '' }}>Perempuan</option>
              </select>
               @error('agama')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

           

            <div class="form-group">
              <label for="">Foto</label>
              <input type="file" class="form-control  @error('foto') is-invalid @enderror"  name="foto"  value="{{isset($pengajar) ? $pengajar->foto : old('foto')}}" placeholder="foto">
              {{-- <input type="file" class="form-control  @error('foto') is-invalid @enderror"  name="foto"  placeholder="foto"> --}}
               @error('foto')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
  
              @if (isset($pengajar))
                  <img src="/{{$pengajar->foto}}" width="100%" class="py-3" alt="">
              @endif
            </div>

            

            <div class="form-group">
              <label for="">Bio</label>
              <textarea class="form-control  @error('bio') is-invalid @enderror" id="summernote"  name="bio" placeholder="Deskripsi Artikel">{{isset($pengajar) ? $pengajar->bio : old('bio')}}</textarea>
              @error('bio')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
              @enderror
            </div>

          </div>
          <div class="col-md-6">
            <h5><strong>Riwayat Pendidikan</strong></h5>
            
            <div class="form-group">
              <label for="">SD</label>
              <input type="text" class="form-control  @error('sd') is-invalid @enderror"  name="sd"  value="{{isset($pengajar) ? $pengajar->sd : old('sd')}}" placeholder="SD">
               @error('sd')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">SMP</label>
              <input type="text" class="form-control  @error('smp') is-invalid @enderror"  name="smp"  value="{{isset($pengajar) ? $pengajar->smp : old('smp')}}" placeholder="SMP">
               @error('smp')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">SMA</label>
              <input type="text" class="form-control  @error('sma') is-invalid @enderror"  name="sma"  value="{{isset($pengajar) ? $pengajar->sma : old('sma')}}" placeholder="SMA">
               @error('sma')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Kampus</label>
              <input type="text" class="form-control  @error('kampus') is-invalid @enderror"  name="kampus"  value="{{isset($pengajar) ? $pengajar->kampus : old('kampus')}}" placeholder="Kampus">
               @error('kampus')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <div class="form-group">
              <label for="">Jurusan</label>
              <input type="text" class="form-control  @error('jurusan') is-invalid @enderror"  name="jurusan"  value="{{isset($pengajar) ? $pengajar->jurusan : old('jurusan')}}" placeholder="Jurusan">
               @error('jurusan')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
               @enderror
            </div>

            <hr>

          </div>
          </div>
         
          
          <a href="/admin/pengajar" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a>
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>




