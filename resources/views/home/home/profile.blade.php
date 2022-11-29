<div class="container">
  <div class="row">
    <div class="col-md-8 pt-2">

      <div class="text-center mb-4">
        <h1 class="brush-font text-orange pt-3">Tentang Kami</h1>
      </div>

      {{-- <a href="/artikel">&LeftArrow; Kembali ke halaman awal</a> --}}
      <h4><strong>{{$profile->title}}</strong></h4>
      <div class="mt-2" style="width: 100%; overflow: hidden">
        <img src="/{{$profile->gambar}}" alt="" style="width:100%;">
      </div>

      <div class="my-5">

        <p>{!! $profile->desc !!}</p>
      <p class="text-mute">diperbaharui pada {{format_indo($profile->updated_at)}}</p>



    <a href="https://api.whatsapp.com/send?phone={{ $kontak->wa }}" target="blank" class="btn btn-success px-5 mt-3"><i class="fas fa-comment"></i> Hubungi Kami di WhatsApp</a>

    
      </div>
    </div>

    <div class="col-md-4">
      <div class="text-success py-4"><h4><strong>Kategori</strong></h4></div>
      <div class="card p-3">
        @foreach ($kategori as $item)
        <a href="/artikel?kategori_id={{$item->id}}" class="text-decoration-none my-2"><strong>{{$item->name}}</strong></a>
        <hr>
        @endforeach
      </div>
    </div>
  </div>
</div>