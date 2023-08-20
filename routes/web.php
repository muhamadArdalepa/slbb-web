<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AdminPageController;

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

Route::prefix('profile-sekolah')->group(function () {
    Route::get('/{route}', [PageController::class, 'profileSekolah'])->name('profile-sekolah');
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
    });
});
