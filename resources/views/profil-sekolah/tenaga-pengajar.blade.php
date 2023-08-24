@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Profile Sekolah', 'route' => '#']],
        'active' => 'Tenaga Pengajar',
    ])
    <section class="bg-white">
        <div class="container">
            <h1 class="mb-4">Tenaga Pengajar</h1>
            <div class="row justify-content-center">
                @foreach ($data as $d)
                    <div class="col-sm-4 col-md-3 mb-5">
                        <div class="card shadow-sm border-0 overflow-hidden">
                            <div class="card-body bg-light">
                                <div class="card-img overflow-hidden" style="max-height: 400px">
                                    <img src="{{ asset('storage/'.$d->picture) }}" alt="Foto {{ $d->name }}" class="img-fluid">
                                </div>
                                <div class="shadow-sm p-2 mt-n3 bg-white text-center rounded-3 position-relative">
                                    <h5 class="mb-0">{{ $d->name }}</h5>
                                    @if ($d->nimp)
                                        <small class="">NIP {{ $d->nimp }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
