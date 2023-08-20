@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'active' => 'Kontak',
    ])
    <section class="bg-white">
        <div class="container">
            <h1 class="mb-4">Kontak</h1>
            <div class="row mb-5">

            </div>
        </div>
    </section>
    @push('js')
    @endpush
@endsection
