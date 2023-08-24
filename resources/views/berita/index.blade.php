@extends('layouts.app', ['title' => 'Berita Terbaru - ']) @section('content')
    @include('layouts.breadcrumbs', ['active' => 'Berita Sekolah'])
    <div class="container">
        <div class="d-flex align-items-center mb-3">

            <h1 class="m-0">Berita Sekolah</h1>
            <form method="GET" class="col-md-6 ms-auto">
                <div class="input-group">
                    <input type="search" class="form-control" name="terms" placeholder="Cari berita. . . "
                        value="{{ request()->terms ?? '' }}">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            <a href="{{ route('berita.create') }}" class="btn btn-primary ms-3">Tambah Berita</a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (request()->terms)
            <div class="small text-muted">Menampilkan pencarian dari: {{ request()->terms ?? '' }}</div>
        @endif
        <div class="row">
            @if ($data->count() < 1)
                <div style="height:  400px" class="d-flex justify-content-center">
                    <div class="align-self-center">Tidak ada data yang ditampilkan</div>
                </div>
            @else
                @foreach ($data as $b)
                    <div class="col-md-6">
                        <div class="card mb-4 overflow-hidden">
                            <a class="text-decoration-none text-dark" href="{{ env('APP_URL') . '/berita/' . $b->slug }}">
                                <div class="d-flex align-items-center mb-4 overflow-hidden" style="max-height: 300px">
                                    <img src="{{ asset('storage/' . $b->img) }}" class="img-fluid" />
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $b->title }}</h5>
                                    <p class="card-text">{{ $b->excerp }}. . .</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            {{ $b->updated_at->diffForHumans() }} | oleh
                                            {{ $b->user->name }}
                                        </small>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
