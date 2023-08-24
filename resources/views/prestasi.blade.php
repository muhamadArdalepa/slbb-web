@extends('layouts.app')
@push('css')
    <style>
        .trigger-container {
            transition: margin 500ms ease-in-out
        }
    </style>
@endpush
@section('content')
    @include('layouts.breadcrumbs', [
        'active' => 'Prestasi',
    ])
    <section class="bg-white">
        <div class="container">
            <h1 class="mb-4">Prestasi</h1>
            <div class="row mb-5">
                <div class="col-md-3">
                    <div class="d-flex flex-column trigger-container">
                        <button id="btn0" class="btn accordion-trigger btn-warning w-100" data-bs-target="#accordion0"
                            role="button" aria-expanded="true" aria-controls="siswa">Prestasi Siswa</button>
                        <div class="px-3">
                            <hr class="my-2 px-3">
                        </div>
                        <button id="btn1" class="btn accordion-trigger btn-light bg-white text-muted w-100"
                            data-bs-toggle="collapse" data-bs-target="#accordion1" role="button" aria-expanded="true"
                            aria-controls="guru">Prestasi Guru</button>
                    </div>
                </div>
                <div class="col-md-8 offset-md-1">
                    <div id="accordion">
                        @foreach ($data as $i => $prestasi)
                            
                        <div class="accordion-item">
                            <div class="accordion-collapse collapse {{ $i == 0 ? 'show' : ''}}" id="accordion{{$i}}" data-toggle="#btn{{$i}}"
                                data-bs-parent="#accordion">
                                @foreach ($prestasi as $d)
                                    <div class="rounded-4 shadow mb-4">
                                        <div class="p-5 mb-4">
                                            <div class="d-flex gap-5 align-items-start">
                                                {!!$d->getImg()!!}
                                                <div class="">
                                                    <h3 class="fw-bold mb-0 lh-1">{{ $d->getRank() }}</h3>
                                                    <h4 class="">{{ $d->name }}</h3>
                                                    <div>{{ $d->desc }}</div>
                                                    <div class="text-muted">Tahun {{ $d->year }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            $('.accordion-trigger').on('click', e => {
                $('.accordion-trigger').attr('data-bs-toggle', 'collapse')
                $('.accordion-trigger').removeClass('btn-warning')
                $('.accordion-trigger').addClass('btn-light')
                $('.accordion-trigger').addClass('text-muted')
                $('.accordion-trigger').addClass('bg-white')
                $(e.currentTarget).removeAttr('data-bs-toggle')
                $(e.currentTarget).addClass('btn-warning')
                $(e.currentTarget).removeClass('btn-light')
                $(e.currentTarget).removeClass('text-muted')
                $(e.currentTarget).removeClass('bg-white')
            })

            $(window).on('scroll', e => {
                let scrollY = $(window).scrollTop()
                setTimeout(() => {
                    $('.trigger-container').css('margin-top', scrollY)
                }, 50);
            })
        </script>
    @endpush
@endsection
