{{-- <div class="img-wrapper-cover">
  <img src="/img/cover.jpeg" width="100%" alt="">
</div> --}}

<div class="text-center mt-5">
  <h3><strong>Kelas</strong></h3>
  <p>Lihat kelas mana yang cocok denganmu 😉</p>
</div>

<div class="container my-5">
<hr>
  <div class="row">

    @if (count($kelas) >= 1)
        
      @foreach($kelas as $row)
      
      <div class="col-md-4 mt-3" data-aos="fade-up"  data-aos-delay="{{$loop->iteration * 200}}">
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

      <div class="d-flex justify-content-center mt-5">
        {{$kelas->links()}}
      </div>

    @else
    <div class="text-center" data-aos="fade-up">
      <img src="/img/no_data.png" width="50%" alt="">
      <h4>Belum ada data</h4>
    </div>
    @endif

  </div>

</div>