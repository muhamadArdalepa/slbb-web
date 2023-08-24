@extends('layouts.app',['title'=>$data->title.' - '])

@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Berita', 'route' => 'berita']],
        'active' => $data->title,
    ])
    <section class="bg-white">
        <div class="container">
            <h1>{{$data->title}}</h1>
            <div class="d-flex align-items-center  mb-4 overflow-hidden" style="max-height: 400px">
                <img src="{{asset('storage/'.$data->img)}}" class="img-fluid">
            </div>
            
            <h2>{{$data->title}}</h2>
            <small class="text-muted d-block">Diubah oleh {{$data->user->name}} pada {{\Carbon\Carbon::parse($data->updated_at)->translatedFormat('l, d F Y')}}</small>
            {!!$data->body!!}
        </div>
    </section>
@endsection