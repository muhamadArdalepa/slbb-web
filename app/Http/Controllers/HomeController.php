<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Ekskuls;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'Home';
        $berita = Berita::latest()->limit(3)->get();
        $ekskul = Ekskuls::latest()->limit(6)->get();
        return view('home', compact('page', 'berita','ekskul'));
    }
    
}
