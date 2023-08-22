@extends('layouts.app',['title'=>'Sejarah Singkat - '])

@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Profile Sekolah', 'route' => '#']],
        'active' => 'Sejarah Singkat',
    ])
    <section class="bg-white">
        <div class="container">
            <h1>Sejarah Singkat</h1>
            <div class="d-flex align-items-center  mb-4 overflow-hidden" style="max-height: 400px">
                <img src="{{asset('storage/'.$data->img)}}" alt="" class="img-fluid">
            </div>
            
            <h2>{{$data->title}}</h2>
            <small class="text-muted d-block">Diubah oleh {{$data->name}} pada {{\Carbon\Carbon::parse($data->updated_at)->translatedFormat('l, d F Y')}}</small>

            {!!$data->body!!}
        </div>
    </section>
@endsection
