@extends('layouts.app')
@push('css')
@endpush
@section('content')
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1">
            </button>
            @foreach ($galeri as $i => $g)
                <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="{{ $i + 1 }}"
                    aria-label="Slide {{ $i + 1 }}">
                </button>
            @endforeach

        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="vh-100">
                    <img src="{{ asset('storage/home_gambar/1.JPG') }}" alt="" class="img-fluid">
                    <div class="vh-100 w-100 position-absolute top-0 bg-gradient-reflect"></div>
                </div>
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>

            @foreach ($galeri as $g)
                <div class="carousel-item">
                    <div class="vh-100">
                        <img src="{{ asset('storage/' . $g->img) }}" alt="" class="img-fluid">
                        <div class="vh-100 w-100 position-absolute top-0 bg-gradient-reflect"></div>
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$g->title}}</h5>
                        <p>{{$g->desc}}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="bg-white py-5">
        <div class="container text-center">
            <h2 class="mb-5">
                <span class="border-bottom border-4 border-warning py-1 px-3 d-inline-block">
                    Berita Terbaru
                </span>
            </h2>
            <div class="row justify-content-center text-start mb-5">
                @php(\Carbon\Carbon::setLocale('id'))
                @foreach ($berita as $b)
                    <div class="col-lg-4">
                        <a class="text-decoration-none text-dark" href="{{ env('APP_URL') . '/berita/' . $b->slug }}">
                            <div class="bg-white overflow-hidden">
                                <div style=" max-height: 300px;" class="overflow-hidden">
                                    <img src="{{ asset('storage/') . '/' . $b->img }}" alt="foto berita"
                                        class="img-fluid rounded-4">
                                </div>
                                <div class="card-body">
                                    <h5 class="mt-3">{{ $b->title }}</h5>
                                    <small class="text-muted"><i class="fa-regular fa-calendar me-2"></i>
                                        {{ \Carbon\Carbon::parse($b->created_at)->translatedFormat('l, j F Y') }}</small>
                                    <p class="card-text">{{ $b->excerp }}</p>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
            <a href="{{ route('berita', 'terbaru') }}" class="btn btn-outline-warning text-dark border-2 ">Tampilkan semua
                berita</a>
        </div>
    </section>
    <section class="bg-light py-4">
        <div class="container text-center">
            <h2 class="mb-5">
                <span class="border-bottom border-4 border-warning py-1 px-3 d-inline-block">
                    Ekstrakurikuler
                </span>
            </h2>
            <div class="row mb-5">
                @foreach ($ekskul as $i => $ex)
                    <div class="col-md-4 col-sm-6  mb-4 {{ $i % 2 == 0 ? 'offset-md-2' : '' }}">
                        <div style="height: 200px" class="rounded-4 position-relative overflow-hidden">
                            <img src="{{ $ex->img }}" alt="gambar ekskul" class="img-fluid">
                            <div
                                class="position-absolute top-0 w-100 bg-warning bg-opacity-75 text-center h-100 d-flex justify-content-center align-items-center">
                                <span class="fs-4 fw-bold text-uppercase">{{ $ex->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('ekstrakurikuler') }}" class="btn btn-outline-warning text-dark border-2 ">Tampilkan semua
                ekstrakurikuler</a>
        </div>
    </section>
    <div id="kontak"></div>
    <section class="bg-white py-4">
        <div class="container mb-5">
            <h2 class="mb-5 text-center">
                <span class="border-bottom border-4 border-warning py-1 px-3 d-inline-block">
                    Hubungi Kami
                </span>
            </h2>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="mb-4">Denah Lokasi</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2821.2255863474697!2d109.35823548881972!3d-0.06828599431134838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59f5d29100a1%3A0x7ddc7442eb1f47cd!2sSekolah%20Luar%20Biasa%20Darma%20Asih!5e0!3m2!1sen!2sid!4v1692050395798!5m2!1sen!2sid"
                        frameborder="0" height="450" class="w-100"></iframe>
                </div>
                <div class="col-md-6 ps-md-5">
                    <h3 class="mb-4">Kontak</h3>
                    <div class="d-flex gap-3 mb-4">
                        <a href="mailto:" class="btn btn-light shadow-sm align-self-start btn-lg"><i
                                class="fa-regular fa-envelope"></i></a>
                        <div class="lh-sm py-1">
                            <div class="fw-bold">Email</div>
                            <div class="">slbbdharmaasih@gmail.com</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-4">
                        <a href="mailto:" class="btn btn-light shadow-sm align-self-start btn-lg"><i
                                class="fa-solid fa-map-location-dot"></i></a>
                        <div class="lh-sm py-1">
                            <div class="fw-bold">Alamat</div>
                            <div class="">Jl. Jenderal Ahmad Yani, Bangka Belitung Darat,
                                <br>Kec. Pontianak Tenggara, Kota Pontianak,
                                <br>Kalimantan Barat 78124
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <a href="mailto:" class="btn btn-light shadow-sm align-self-start btn-lg"><i
                                class="fa-solid fa-map-location-dot"></i></a>
                        <div class="lh-sm py-1">
                            <div class="fw-bold">Telepon</div>
                            <div class=""></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
