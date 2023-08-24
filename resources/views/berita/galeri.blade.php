@extends('layouts.app', ['title' => 'Galeri - '])

@section('content')
    @include('layouts.breadcrumbs', [
        'active' => 'Galeri',
    ])
    <div class="container">
        <h1>Galeri</h1>
        <div class="overflow-hidden galeri-container">

        </div>
    </div>
@endsection
@push('js')
    <script>
        const galeri = @json($data);
        const baseUrl = `{{ env('APP_URL') }}`
        let row = 1;
        $(document).ready(() => {

            $('.galeri-container').append(
                `<div style="height:500px" id="row${row}" class="d-inline-flex gap-2 row-container"></div>`)
            galeri.forEach(e => {
                if ($('#row' + row)[0].offsetWidth >= $('.galeri-container')[0].offsetWidth) {
                    $('.galeri-container').append(`<div style="height:500px" id="row` + (++row) +
                        `" class="d-inline-flex gap-2 row-container"></div>`)
                }
                $('#row' + row).append(`<img style="height:100%" src="${baseUrl}/storage/${e.img}">`)
                // e.
            });

            $('.row-container').each(i => {
                var fitHeight = $('.galeri-container')[0].offsetWidth * 500 / $('.row-container')[i].offsetWidth
                $($('.row-container')[i]).css('height', fitHeight + 'px')
                console.log($('.row-container')[i].offsetWidth)
            })
        })
    </script>
@endpush