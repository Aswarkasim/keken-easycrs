<div class="img-wrapper-cover">
  <img src="/img/cover.jpeg" width="100%" alt="">
</div>

<div class="container my-4">

  <div class="row">
    <div class="col-md-8">
      <div class="text-success pt-2"><h4><strong>Lowongan Pekerjaan  </strong></h4></div>
      @if (request('kategori_id'))
      <h5><strong>Menampilkan kategori {{$kategori_detail->name}}</strong></h5>          
      @endif

      
      @if (count($lowongan) > 0)
          
      @foreach ($lowongan as $item)
          
      <div class="card mt-2 shadow-sm rounded">
        <div class="d-flex">
          <img src="/{{$item->cover}}" width="200px" alt="">
          
          <div class="content-text p-4">
            <h5><a href="/lowongan/show/{{$item->id}}" class="text-decoration-none"><strong>{{$item->title}}</strong></a></h5>
            <p>{!! Illuminate\Support\Str::limit($item->desc,100) !!}</p>
          </div>
        </div>
      </div>

      @endforeach

       <div class="float-right">
            {{$lowongan->appends(request()->except('page'))->links()}}
          </div>

      @else
      <p class="alert alert-info"><i class="fas fa-info"></i> Belum ada berita tentang {{ isset($kategori_detail) ? $kategori_detail->name : ''}}</p>
      @endif


    </div>

    <div class="col-md-4">
      <div class="text-success py-4"><h4><strong>Kategori Berita</strong></h4></div>
      <div class="card p-3">
        @foreach ($kategori as $item)
        <a href="/artikel?kategori_id={{$item->id}}" class="text-decoration-none my-2"><strong>{{$item->name}}</strong></a>
        <hr>
        @endforeach
      </div>

      <div class="text-success pt-4"><h4><strong>Artikel Terkait</strong></h4></div>
      <div class="card p-3">
        @foreach ($lowongan as $item)
          <div class="card mt-2 shadow-sm rounded">
            <div class="d-flex" >
              <div class="" style="width: 150px; max-height: 150%; overflow: hidden;">
                <img src="/{{ $item->image }}" width="100%" alt="">
              </div>
              <div class="p-3">
                <a href = "" class="text-decoration-none">{{ $item->title }}</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>


    </div>

    

  </div>
</div>