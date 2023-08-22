<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\UpdatePages;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return redirect(route('home'));
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::prefix('berita')->group(function () {
    Route::get('/', [BeritaController::class, 'index'])->name('berita');
    Route::get('/{slug}', [BeritaController::class, 'show'])->name('berita.show');
});

Route::prefix('profil-sekolah')->group(function () {
    Route::get('/{route}', [PageController::class, 'profilSekolah'])->name('profil-sekolah');
});

Route::get('/ekstrakurikuler', [PageController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/prestasi', [PageController::class, 'prestasi'])->name('prestasi');
Route::get('/kontak', [PageController::class, 'kontak'])->name('kontak');

Route::middleware('auth')->group(function () {
    Route::prefix('kegiatan-siswa')->group(function () {
        Route::get('/', [PageController::class, 'kegiatanSiswa'])->name('kegiatan-siswa');
    });

    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminPageController::class, 'index'])->name('admin.home');
        Route::get('/profil-sekolah/sarana-prasarana/create', [AdminPageController::class, 'profilSekolah'])->name('sarana-prasarana.create');
        Route::prefix('profil-sekolah')->group(function () {
            Route::get('/{route}', [AdminPageController::class, 'profilSekolah'])->name('admin.profil-sekolah');
        });

        Route::prefix('berita')->group(function () {
            Route::get('/{route}', [AdminPageController::class, 'profilSekolah'])->name('admin.berita');
        });
        
        Route::get('/ekstrakurikuler', [AdminPageController::class, 'ekstrakurikuler'])->name('admin.ekstrakurikuler');
        Route::get('/prestasi', [AdminPageController::class, 'prestasi'])->name('admin.prestasi');
        Route::get('/kontak', [AdminPageController::class, 'kontak'])->name('admin.kontak');
        Route::get('/kegiatan-siswa', [AdminPageController::class, 'kegiatan-siswa'])->name('admin.kegiatan-siswa');



        Route::post('/update-pages',UpdatePages::class)->name('update.pages');
    });
});
