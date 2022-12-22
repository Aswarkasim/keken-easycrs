<link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">

<div class="row">
  <div class="col-md-12">
    <div class="p-3  card">
      <div class="card-body">


          <form action="/admin/profile/update" method="POST" enctype="multipart/form-data">  
            @method('PUT')
          @csrf
        
          <div class="row">

            <div class="col-md-6">
             


              <div class="form-group">
                <label for="">Profil</label>
                <textarea class="form-control  @error('desc') is-invalid @enderror" id="summernote"  name="desc">{{isset($profile) ? $profile->desc : old('desc')}}</textarea>
                @error('desc')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>

               

            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="">Gambar</label>
                <input type="file" class="form-control  @error('gambar') is-invalid @enderror"  name="gambar"  placeholder="gambar">
                {{-- <input type="file" class="form-control  @error('gambar') is-invalid @enderror"  name="gambar"  placeholder="gambar"> --}}
                @error('gambar')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror

                @if (isset($profile))
                    <img src="/{{$profile->gambar}}" width="100%" class="py-3" alt="">
                @endif
              </div>
            </div>
          </div>
          

       

          {{-- <a href="/admin/profile" class="btn btn-info "><i class="fa fa-arrow-left"></i> Kembali</a> --}}
         <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        
        </form>
      </div>
    </div>
  </div>
</div>

<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>