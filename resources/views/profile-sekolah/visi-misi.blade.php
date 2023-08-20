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
                <img src="https://dummyimage.com/4:3x1080/" alt="" class="img-fluid">
            </div>
            <h2 class="text-center">Visi</h2>
            <p class="text-center">
                Terselenggaranya Pembelajaran Tunarungu seoptimal mungkin sehingga berkembang menjadi manusia seutuhnya,
                bermatabat, berguna bagi diri sendiri, masyarakat, nusa dan bangsa dilandasi iman dan taqwa.
            </p>
            <h2 class="text-center">Misi</h2>

            <ol>
                <li class="ps-2 mb-2">Mengurangi dampak ketunarunguan melalui kegiatan asesmen psikologi dan audiometris, serta
                    mengupayakan pemakaian alat bantu dengar secara efektif.</li>

                <li class="ps-2 mb-2">Mewujudkan sekolah yang ramah dan santun.</li>

                <li class="ps-2 mb-2">Menyelenggarakan pengembangan diri / Ekstrakurikuler bidang seni, olahraga dan keterampilan</li>

                <li class="ps-2 mb-2">Pendampingan siswa berbakat</li>

                <li class="ps-2 mb-2">Pendampingan siswa magang</li>

                <li class="ps-2 mb-2">Menjalin kerja sama DUDI</li>
            </ol>
        </div>
    </section>
@endsection
