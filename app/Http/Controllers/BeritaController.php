<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil semua berita
        $berita = Berita::all();

        // Menampilkan view daftar berita
        return view('berita.index', compact('berita'));
    }

    public function show($slug)
    {
        // Mengambil berita berdasarkan slug
        $berita = Berita::where('slug', $slug)->first();

        // Jika berita tidak ditemukan, redirect atau tampilkan error sesuai kebutuhan

        // Menampilkan view detail berita
        return view('berita.show', compact('berita'));
    }
}
