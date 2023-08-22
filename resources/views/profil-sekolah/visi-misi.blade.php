@extends('layouts.app')

@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Profile Sekolah', 'route' => '#']],
        'active' => 'Visi Misi',
    ])
    <section class="bg-white">
        <div class="container">
            <h1>Visi dan Misi</h1>
            <div class="d-flex align-items-center  mb-4 overflow-hidden" style="max-height: 400px">
                <img src="{{ asset('storage/'.$data->img) }}" alt="" class="img-fluid">
            </div>
            <h2 class="text-center">Visi</h2>
            {!!$data->visi!!}
            
            <h2 class="text-center">Misi</h2>
            {!!$data->misi!!}

        </div>
    </section>
@endsection
