<link href="/dist/css/carousel.css" rel="stylesheet">


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach ($banner as $key => $item)
    <li data-target="#myCarousel" data-slide-to="{{$key}}" class="{{$item->urutan == '1' ? 'active' : ''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">

    @foreach ($banner as $item)
        
    <div class="carousel-item {{$item->urutan == '1' ? 'active' : ''}}">
      <img class="first-slide" src="{{$item->image}}" width="100%"  alt="First slide">
      <div class="container">
        <div class="carousel-caption text-left">
          {{-- <h1>{{$item->topik}}</h1>
          <p>{!!$item->desc!!}</p> --}}
          {{-- <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p> --}}
        </div>
      </div>
    </div>
    @endforeach

  </div>
  <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container">
  <div class="row">

    <div class="text-center">
      <h3><strong>Kelas</strong></h3>
      <p>Lihat kelas mana yang cocok denganmu 😉</p>
    </div>

    @foreach($kelas as $row)
      
      <div class="col-md-3 mt-3" data-aos="fade-up"  data-aos-delay="{{$loop->iteration * 200}}">
        <div class="wrapper-card-box">
          <div class="img-wrapper-box">
            <img src="/{{$row->cover}}" width="100%" class="zoom-in" alt="">
          </div>
          <div class="content-wrapper-box p-4">
            <h6 class="pt-2"><b>{{ Illuminate\Support\Str::limit($row->name,25)}}</b></h6>
            {{-- <span class="text-muted"><i class="fas fa-map-marker-alt"></i> Kec. {{$row->kecamatan->name}}</span> --}}
            <div class="d-flex">
              <p class="price-box text-success"><b>{{format_rupiah($row->harga)}}</b></p>
              <h6 class="text-muted">/Bulan</h6> 
            </div>
            
            <a href="/kelas/show/{{$row->id}}" class="btn btn-box mt-3">Lihat</a>
          </div>
        </div>
      </div>
      @endforeach

      <div class="text-center mt-3">
        <a href="/kelas" class="btn btn-success px-5">Selengkapnya &RightArrow;</a>
      </div>

  </div>
</div>


<div class="col-md-12 bg-success py-5 my-5">
  <div class="container">
    <h5 class="text-white">Apa yang kami Punya?</h5>
    <p class="text-white">Lihat selengkapnya di laman ini</p>
  </div>
</div>


<div class="container">

  <div class="text-center">
    <h3><strong>Lowongan</strong></h3>
    <p>Mungkin saja ada yang sesuai passion mu</p>
  </div>

  <div class="row">
    @foreach ($lowongan as $item)
          
    <div class="col-md-3 mt-3" data-aos="fade-up"  data-aos-delay="{{$loop->iteration * 200}}">
      <div class="wrapper-card-box">
        <div class="img-wrapper-box">
          <img src="/{{$item->cover}}" width="100%" class="zoom-in" alt="">
        </div>
        <div class="content-wrapper-box p-4">
          <h6 class="pt-2"><b>{{ Illuminate\Support\Str::limit($item->title,25)}}</b></h6>
          <p class="pt-2">{!! Illuminate\Support\Str::limit($item->desc,50)!!}</p>
          
          <a href="/kelas/show/{{$item->id}}" class="btn btn-box mt-3">Lihat</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  
</div>



<div class="col-md-12 py-5 my-5" style="background-color: #f0f0f0">
  <div class="container text-center text-dark">
    <h5 class="">Anda punya hal yang ingin ditanyakan?</h5>
    {{-- <p class="text-white">Lihat selengkapnya di laman ini</p> --}}
    <a href="https://api.whatsapp.com/send?phone={{ $kontak->wa }}" target="blank" class="btn btn-success px-5 mt-3"><i class="fas fa-comment"></i> Hubungi Kami di WhatsApp</a>
  </div>
</div>
