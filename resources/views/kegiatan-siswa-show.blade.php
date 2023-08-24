@extends('layouts.app', ['title' => 'Kelas ' . $kelas->name . ' - '])

@push('css')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Kegiatan Siswa', 'route' => 'kegiatan-siswa']],
        'active' => 'Kelas ' . $kelas->name,
    ])
    <section class="bg-white pb-5">
        <div class="container mb-5">
            <div class="d-flex align-items-center mb-4">
                <h1 class="mb-0">Kegiatan Siswa Kelas {{ $kelas->name }}</h1>
                <a href="{{ route('kegiatan-siswa.create', ['kelas' => $kelas->id]) }}" class="btn btn-primary ms-auto">Tambah
                    kegiatan</a>
            </div>

            <ul class="list-group text-justify">
                @foreach ($data as $kegiatan)
                    <li class="list-group-item p-0 overflow-hidden">
                        @if ($kegiatan->img)
                        <div class="d-flex">
                            <div class="col-md-4"
                            style="
                                    background-image: url('{{ asset('storage/' . $kegiatan->img) }}');
                                    background-size:cover;
                                    background-position:center center;
                                    ">
                            </div>
                            @endif
                            <div class="{{$kegiatan->img?'col-md-8':''}} p-4">
                                <h4>{{ $kegiatan->title }}</h4>
                                <p>{{ $kegiatan->desc }}</p>
                                <div class="text-end">
                                    <a href="{{ route('kegiatan-siswa.edit', $kegiatan->id) }}"
                                        class="btn btn-primary">Edit</a>
                                    <button href="" class="btn btn-danger">Hapus</button>
                                </div>
                            </div>
                            @if ($kegiatan->img)
                        </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    @push('js')
    @endpush
@endsection
