@extends('layouts.app')
@push('css')
    <style>
        .map {
            height: 100vh;
            width: 100%;
            overflow: auto;
            padding: 5rem 0;
        }

        .map img {
            height: calc(100% * 2);
        }
    </style>
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Profile Sekolah', 'route' => '#']],
        'active' => 'Struktur Organisasi',
    ])
    <section class="bg-white">
        <div class="container">
            <h1>Sarana dan Prasarana</h1>
            <small class="text-muted d-block">Diubah oleh {{$data->name}} pada {{\Carbon\Carbon::parse($data->updated_at)->translatedFormat('l, d F Y')}}</small>       
            <div class="map-container">
                <div class="drag-notification">Seret untuk menjelajahi</div>
                <div class="map overflow-hidden py-5" id="mapContainer" style="cursor: grab;">
                    <img src="{{ asset('storage/'.$data->img) }}"
                        alt="struktur organisasi" class="vh100" draggable="false">
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            var mapContainer = document.getElementById("mapContainer");
            var isDragging = false;
            var startCoords = {
                x: 0,
                y: 0
            };

            // Fungsi untuk menggulirkan peta ke tengah secara horizontal
            function scrollToCenter() {
                var middleOfMap = mapContainer.scrollWidth / 2 - mapContainer.clientWidth / 2;
                mapContainer.scrollTo(middleOfMap, mapContainer.scrollTop);
            }

            // Fungsi untuk memulai menyeret
            function startDragging(event) {
                isDragging = true;
                startCoords.x = event.clientX;
                startCoords.y = event.clientY;
                mapContainer.style.cursor = "grabbing";

                // Sembunyikan pemberitahuan
                var dragNotification = document.querySelector(".drag-notification");
                dragNotification.style.display = "none";
            }

            // Fungsi untuk menghitung perpindahan dan menggulirkan saat menyeret
            function dragMap(event) {
                if (!isDragging) return;
                var deltaX = startCoords.x - event.clientX;
                var deltaY = startCoords.y - event.clientY;
                startCoords.x = event.clientX;
                startCoords.y = event.clientY;

                mapContainer.scrollLeft += deltaX;
                mapContainer.scrollTop += deltaY;
            }

            // Fungsi untuk berhenti menyeret
            function stopDragging() {
                isDragging = false;
                mapContainer.style.cursor = "grab";

                // Tampilkan kembali pemberitahuan setelah berhenti menyeret
                var dragNotification = document.querySelector(".drag-notification");
                dragNotification.style.display = "block";
            }

            // Event listener saat halaman selesai dimuat
            document.addEventListener("DOMContentLoaded", function(event) {
                scrollToCenter();

                mapContainer.addEventListener("mousedown", startDragging);
                mapContainer.addEventListener("mousemove", dragMap);
                mapContainer.addEventListener("mouseup", stopDragging);
                mapContainer.addEventListener("mouseleave", stopDragging);

                mapContainer.addEventListener("touchstart", function(event) {
                    startDragging(event.touches[0]);
                });
                mapContainer.addEventListener("touchmove", function(event) {
                    dragMap(event.touches[0]);
                });
                mapContainer.addEventListener("touchend", stopDragging);
            });
        </script>
    @endpush
@endsection
