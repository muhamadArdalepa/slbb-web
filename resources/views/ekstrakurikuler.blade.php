@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'active' => 'Ekstrakurikuler',
    ])
    <section class="bg-white">
        <div class="container">
            <h1 class="mb-4">Ekstrakurikuler</h1>
            <div class="row mb-5">
                @foreach ($data as $i => $ex)
                    <div class="col-md-4 col-sm-6  mb-4">
                        <div style="height: 200px" class="rounded-4 position-relative overflow-hidden">
                            <img src="{{ $ex->img }}" alt="gambar ekskul" class="img-fluid">
                            <div
                                class="position-absolute top-0 w-100 bg-warning bg-opacity-75 text-center h-100 d-flex justify-content-center align-items-center">
                                <span class="fs-4 fw-bold text-uppercase">{{ $ex->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @push('js')
    @endpush
@endsection
