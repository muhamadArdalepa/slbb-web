@extends('layouts.app')

@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="vh-100 bg-secondary"></div>
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>

    <div class="carousel-item">
      <div class="vh-100 bg-secondary"></div>
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="container py-4">
    <h1 class="text-center mb-4">Berita Terbaru</h1>
    <div class="row justify-content-center">
    @foreach ($berita as $b)
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">{{$b->judul}}</h5>
            <p class="card-text">{{ $b->excerp }}</p>
            <a href="/berita/{{$b->slug}}" class="btn btn-primary">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
</div>
@endsection
