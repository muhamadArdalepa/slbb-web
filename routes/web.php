<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UpdatePages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanSiswa;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\KegiatanSiswaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\TenagaPengajarController;
use App\Http\Controllers\SaranaPrasaranaController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\VisiMisiController;

// auth
Auth::routes(['except' => [
    'register'
]]);

// public
Route::get('/', function () {
    return redirect(route('home'));
});
Route::get('/home', [PageController::class, 'index'])->name('home');
Route::get('/berita/{route}', [PageController::class, 'berita'])->name('berita');
Route::get('/profil-sekolah/{route}', [PageController::class, 'profilSekolah'])->name('profil-sekolah');
Route::get('/ekstrakurikuler', [PageController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/prestasi', [PageController::class, 'prestasi'])->name('prestasi');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

// auth
Route::get('/kegiatan-siswa', [PageController::class, 'kegiatanSiswa'])->name('kegiatan-siswa');
Route::resource('kegiatan-siswa', KegiatanSiswaController::class)->except(['index']);


Route::middleware(['auth','auth.admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/',function () {
            return redirect(route('admin.dashboard'));
        });

        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        Route::get('/home', [HomeController::class,'index'])->name('admin.home');
        Route::resource('/profil-sekolah/sejarah', SejarahController::class);
        Route::resource('/profil-sekolah/visi-misi', VisiMisiController::class);
        Route::resource('/profil-sekolah/sarana-prasarana', SaranaPrasaranaController::class);
        Route::resource('/profil-sekolah/struktur-organisasi', StrukturOrganisasiController::class);
        Route::resource('/profil-sekolah/tenaga-pengajar', TenagaPengajarController::class);
        Route::resource('/berita/terbaru', BeritaController::class);
        Route::resource('/berita/galeri', GaleriController::class);
        Route::resource('/ekstrakurikuler', EkstrakurikulerController::class);
        Route::resource('/prestasi', PrestasiController::class);

    
    });
});
