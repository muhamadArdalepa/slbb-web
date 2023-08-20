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
            <h1>Sarana dan Prasarana</h1>
            <div id="map" class="vh-100"></div>
        </div>
    </section>
    @push('js')
        <script>
            var map = L.map('map').setView([51.505, -0.09], 13);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(map);
        </script>
    @endpush
@endsection
