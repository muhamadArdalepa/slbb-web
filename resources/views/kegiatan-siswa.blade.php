@extends('layouts.app')
@push('css')
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'active' => 'Kegiatan Siswa',
    ])
    <section class="bg-white">
        <div class="container">
            <div class="d-flex align-items-center mb-3">
                <h1 class="m-0">Kegiatan Siswa</h1>
                <form method="GET" class="col-md-6 ms-auto">
                    <div class="input-group">
                        <input type="search" class="form-control" name="terms" placeholder="Cari kelas. . . "
                            value="{{ request()->terms ?? '' }}">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
            @foreach ($data as $h => $jenjang)
                <div class="d-flex align-items-center">
                    <h3 class="text-uppercase mb-0">{{ $jenjang->count() > 0 ? $jenjang[0]->jenjang : '' }}</h3>
                    @if ($jenjang->count() > 4)
                        <a href="javascript:;" class="link ms-auto">Lihat semua</a>
                    @endif
                </div>
                <div class="row flex-nowrap overflow-hidden">
                    @foreach ($jenjang as $i => $kelas)
                        @php
                            $jimg = ['Kindergarten student-cuate.svg', 'Knowledge-pana.svg', 'Thesis-pana.svg'];
                        @endphp
                        <div class="col-md-3">
                            <div class="card mb-4 overflow-hidden">
                                <img src="{{ asset('storage/' . $jimg[$h]) }}" style="height: 150px" />
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h5 class="card-title m-0">Kelas {{ $kelas->name }}</h5>
                                        <a href="{{ route('kegiatan-siswa.show', $kelas->name) }}"
                                            class="btn btn-dark">Akses</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
    @push('js')
        <script>
            $('.link').on('click', e => {
                $($(e.currentTarget).parent()).next()[0].classList.toggle('flex-nowrap')
            })
        </script>
    @endpush
@endsection
