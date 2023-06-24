@extends('layouts.app')

@section('content')
<div class="container py-5 mt-5">
    <h1>Berita</h1>
    @foreach ($berita as $b)

        <div class="card mb-3">
            <a class="text-decoration-none  text-dark" href="/berita/{{ $b->slug }}">
                <div class="card-body">
                    <h5 class="card-title">{{$b->judul}}</h5>
                    <p class="card-text">{{$b->excerp}}. . .</p>
                    <p class="card-text"><small class="text-muted">{{ $b->updated_at->diffForHumans() }} | oleh {{$b->user->name}}</small></p>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection
