<div class="container">
  <div class="row">
    <div class="col-md-8 pt-2">

      <a href="/artikel">&LeftArrow; Kembali ke halaman awal</a>
      <h4><strong>{{$kelas->title}}</strong></h4>
      <p class="text-mute">ditambahkan pada {{format_indo($kelas->created_at)}}</p>
      <div class="mt-2" style="width: 100%; max-height:300px; overflow: hidden">
        <img src="/{{$kelas->cover}}" alt="" style="width:100%;">
      </div>

      <div class="my-4">
        <p>{!!$kelas->desc!!}</p>
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