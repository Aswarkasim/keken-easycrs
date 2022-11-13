<div class="container">
  <div class="row">
    <div class="col-md-8 pt-2">

      <a href="/artikel">&LeftArrow; Kembali ke halaman awal</a>
      <h4><strong>{{$kelas->title}}</strong></h4>
      <p class="text-mute">ditambahkan pada {{format_indo($kelas->created_at)}}</p>
      <div class="mt-2" style="width: 100%; max-height:300px; overflow: hidden">
        <img src="/{{$kelas->cover}}" alt="" style="width:100%;">
      </div>

      <div class="my-5">

        <h6><b>Harga : {{ format_rupiah($kelas->harga) }}</b></h6><br>
        <h6><b>Kapasitas : {{ $kelas->kapasitas }} Orang</b></h6><br>
        <p>{!!$kelas->desc!!}</p>


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