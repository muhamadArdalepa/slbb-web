@push('css')
    <style>
        .accordion-item i{
            transition: transform 300ms ease-in-out
        }
    </style>
@endpush
<div class="offcanvas offcanvas-start z-0 border-0 bg-light shadow-sm" style="top: unset;width: unset"
    data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
    aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-body">
        <div class="accordion" style="width: 240px">
            <a href="admin"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.home' ? 'warning' : 'light' }}  w-100 text-start">
                Dashboard
            </a>
            <div class="accordion-item my-1 bg-transparent border-0" id="heading-1">
                <a href="#" class="btn my-1 btn-light w-100 text-start d-flex" data-bs-toggle="collapse"
                    data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                    Profile Sekolah
                    <i class="fa-solid fa-chevron-down ms-auto align-self-center fa-2xs collapse-1"></i>
                </a>
                <div id="collapse-1"
                    class="accordion-collapse ps-3 {{ Route::currentRouteName() == 'admin.profile-sekolah' ? '' : 'collapse' }}"
                    aria-labelledby="heading-1">
                    <a href="admin/profile-sekolah/sejarah" class="btn btn-light my-1 w-100 text-start">
                        Sejarah Singkat
                    </a>
                </div>
            </div>
            <a href="admin"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.berita' ? 'warning' : 'light' }}  w-100 text-start">
                Berita
            </a>
            <a href="admin"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.ekskurikkuler' ? 'warning' : 'light' }}  w-100 text-start">
                Ekstrakurikuler
            </a>
            <a href="admin"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.prestasi' ? 'warning' : 'light' }}  w-100 text-start">
                Prestasi
            </a>
            <a href="admin"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.kontak' ? 'warning' : 'light' }}  w-100 text-start">
                Kontak
            </a>
            <a href="admin"
                class="btn my-1 btn-{{ Route::currentRouteName() == 'admin.kegiatan-siswa' ? 'warning' : 'light' }}  w-100 text-start">
                Kegiatan Siswa
            </a>

        </div>
        <div class="text-center p-4">
            <span class="btn my-1 border-0 mx-auto" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fa-solid fa-circle-chevron-left fa-2xl opacity-25"></i>
            </span>
        </div>
    </div>
</div>

@push('js')
    <script>
        $('.offcanvas').css('height', 'calc(100vh - ' + $('nav')[0].offsetHeight + 'px)')
    </script>
@endpush
