<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UpdatePages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilSekolahController;
use App\Http\Controllers\SaranaPrasaranaController;
use App\Http\Controllers\SejarahController;
use App\Http\Controllers\StrukturOrganisasiController;
use App\Http\Controllers\TenagaPengajarController;

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


Route::middleware(['auth','auth.admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/',function () {
            return redirect(route('admin.dashboard'));
        });

        Route::get('/dashboard', DashboardController::class)->name('admin.dashboard');
        Route::get('/home', [HomeController::class,'index'])->name('admin.home');
        Route::resource('/profil-sekolah/sejarah', SejarahController::class);
        Route::resource('/profil-sekolah/sarana-prasarana', SaranaPrasaranaController::class);
        Route::resource('/profil-sekolah/struktur-organisasi', StrukturOrganisasiController::class);
        Route::resource('/profil-sekolah/tenaga-pengajar', TenagaPengajarController::class);
        
        Route::resource('/berita', BeritaController::class);

        
        Route::prefix('berita')->group(function () {
            Route::get('/{route}', [AdminPageController::class, 'profilSekolah'])->name('admin.berita');
        });

        Route::get('/ekstrakurikuler', [AdminPageController::class, 'ekstrakurikuler'])->name('admin.ekstrakurikuler');
        Route::get('/prestasi', [AdminPageController::class, 'prestasi'])->name('admin.prestasi');
        Route::get('/kontak', [AdminPageController::class, 'kontak'])->name('admin.kontak');
        Route::get('/kegiatan-siswa', [AdminPageController::class, 'kegiatan-siswa'])->name('admin.kegiatan-siswa');



        Route::post('/update-pages', UpdatePages::class)->name('update.pages');
    });
});
