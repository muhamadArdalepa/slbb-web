@extends('layouts.app')

@section('content')
<div class="container py-5 ">
    <div class="d-flex justify-content-between align-items-center">
    <h1>Berita</h1>
        @auth
        @if(Auth::user()->role == 0)
        <a href="/berita/create" class="btn btn-primary ">
            <i class="fa-solid fa-plus"></i>
            Tambah Berita
        </a>
        @endif
        @endauth
    </div>
    @foreach ($berita as $b)
    <div class="card mb-3 overflow-hidden">
        <a class="text-decoration-none  text-dark" href="/berita/{{ $b->slug }}">
            <div style="
                height: 300px;
                background-image: url('{{ asset('storage/berita_gambar') .'/'. $b->gambar}}');
                background-size: cover;
                "></div>
            <div class="card-body">
                <h5 class="card-title">{{$b->judul}}</h5>
                <p class="card-text">{{$b->excerp}}. . .</p>
                <p class="card-text"><small class="text-muted">{{ $b->updated_at->diffForHumans() }} | oleh
                        {{$b->user->name}}</small></p>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection