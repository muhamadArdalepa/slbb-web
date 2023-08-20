@extends('layouts.app',['title'=>'Sejarah Singkat - '])

@section('content')
    @include('layouts.breadcrumbs', [
        'pages' => [['name' => 'Profile Sekolah', 'route' => '#']],
        'active' => 'Sejarah Singkat',
    ])
    <section class="bg-white">
        <div class="container">
            <h1>Sejarah Singkat</h1>
            <div class="d-flex align-items-center  mb-4 overflow-hidden" style="max-height: 400px">
                <img src="https://dummyimage.com/4:3x1080/" alt="" class="img-fluid">
            </div>
            <h2>Sejarah SLB - B Dharma Asih</h2>
            <p>SLB-B Dharma Asih Pontianak merupakan sekolah yang diperuntukkan bagi anak-anak penyandang tuna rungu yang
                berdiri pada tanggal 13 Maret 1972 dibawah naungan Lembaga Pendidikan SLB Dharma Asih Pontianak.</p>

            <p>Pada awal berdirinya SLB-B Dharma Asih Pontianak hanya dibuka untuk kelas persiapan 1 yaitu TKLB dan seiring
                dengan perkembangan SLB-B Dharma Asih kini memiliki beberapa jenjang yaitu SDLB,SMPLB hingga SMALB. Namun
                pada tanggal 14 Juli 2014 Lembaga Pendidikan SLB Dharma Asih membuat kebijakan baru , yaitu untuk memisahkan
                siswa jenjang TKLB dari SLB-B Dharma Asih Pontianak, sehingga mulai tanggal 14 Juli 2014 SLB-B Dharma Asih
                hanya memiliki jenjang SDLB,SMPLB dan SMALB.</p>

            <p>Perkembangan siswa yang dimiliki SLB-B Dharma Asih kian mengalami penambahan siswa dari tahun ke tahun, pada
                tahun ajaran 2020/2021 siswa SLB-B Dharma Asih Pontianak siswa sebanyak 120 orang dengan rincian SDLB
                berjumlah 74 siswa, SMPLB berjumlah 26 siswa dan SMALB berjumlah 20 siswa. Dalam proses belajar mengajar
                para siswa akan dibimbing oleh 19 orang pengajar (Guru) dengan latar belakang Pendidikan Luar Biasa sebanyak
                5 orang, guru keterampilan ebanyak 5 orang, guru kelas sebanyak 8 orang dan 1 orang guru bimbingan
                konseling.</p>
        </div>
    </section>
@endsection
