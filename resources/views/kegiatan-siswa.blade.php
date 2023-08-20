@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'active' => 'Kegiatan Siswa',
    ])
    <section class="bg-white">
        <div class="container">
            <h1 class="mb-4">Kegiatan Siswa</h1>
            <div class="row mb-5">

            </div>
        </div>
    </section>
    @push('js')
    @endpush
@endsection
