<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $page = 'Home';
        $berita = Berita::latest()->limit(3)->get();
    
        return view('home', compact('page', 'berita'));
    }
}
