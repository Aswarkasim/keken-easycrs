<div class="container my-5">
  <div class="row">
    <div class="col-md-8">
      <div class="text-center mb-4">
        <h1 class="brush-font text-orange pt-3">Galeri</h1>
      </div>
      
      <div class="row ">
    
        @foreach ($galeri as $item)
            
        <a href="{{ $item->gambar }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-3">
          <img src="{{ $item->gambar }}" class="img-fluid rounded py-3">
        </a>
        @endforeach
      </div>
    
      <div class="d-flex justify-content-center mt-5">
        {{$galeri->links()}}
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



<script>
  $(document).on("click", '[data-toggle="lightbox"]', function(event) {
  event.preventDefault();
  $(this).ekkoLightbox();
});
</script>