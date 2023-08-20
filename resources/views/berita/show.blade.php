@extends('layouts.app')

@section('content')
<section class="pt-5">
    <div class="container py-5 ">
        <h3 class="mb-0">{{$berita->judul}}</h3>
        <div>{{ $berita->updated_at->diffForHumans() }} oleh {{$berita->user->name}}</div>
        <div style="
    height: 400px;
    background-image: url('{{ asset('storage/berita_gambar') .'/'. $berita->gambar}}');
    background-size: cover;
    "></div>
    <div>{!!$berita->isi!!}</div>
</div>
</section>
@endsection
