@extends('layouts.app')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Profile Sekolah', 'route' => '#']],
        'active' => 'Sarana Prasarana',
    ])
    <section class="bg-white">
        <div class="container">
            <h1 class="mb-4">Sarana dan Prasarana</h1>
            <div class="row">
                @foreach ($data as $d)
                <div class="col-sm-6 col-md-4 mb-5">
                    <h3>{{$d->name}}</h3>
                    <img src="{{$d->img}}" alt="Foto {{$d->name}}" class="img-fluid">
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
