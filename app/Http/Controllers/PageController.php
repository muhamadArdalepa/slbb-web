<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Ekskuls;
use App\Models\Sarpras;
use App\Models\Sejarah;
use App\Models\Prestasi;
use App\Models\StrukturOrganisasi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $page = 'Home';
        $berita = Berita::latest()->limit(3)->get();
        $ekskul = Ekskuls::latest()->limit(6)->get();
        return view('home', compact('page', 'berita','ekskul'));
    }

    public function profilSekolah($route)
    {
        $data = [];
        switch ($route) {
            case 'sejarah':
                $data = Sejarah::select('users.name','sejarahs.*')->join('users','editor','=','users.id')->first();
                break;
            case 'visi-misi':
                $data = VisiMisi::select('users.name','visi_misis.*')->join('users','editor','=','users.id')->first();
                break;
            case 'sarana-prasarana':
                $data = Sarpras::all();
                break;
            case 'struktur-organisasi':
                $data = StrukturOrganisasi::select('users.name','struktur_organisasis.*')->join('users','editor','=','users.id')->first();
                break;
            case 'tenaga-pengajar':
                $data = User::where('role',2)->get();
                break;
        }
        return view('profil-sekolah.'.$route,compact('data'));
    }

    public function berita(Request $request, $route)
    {
        switch ($route) {
            case 'terbaru':
                $query = Berita::with('user');
                if($request->has('terms')){
                    $query->where('title','LIKE','%'.$request->terms.'%');
                }
                $data = $query->get();
                return view('berita.index', compact('data'));
                break;
            case 'galeri':
                // $data = Galeri::with('user')->get();
                return view('berita.galeri');
                break;
            default:
                $data = Berita::with('user')->where('slug', $route)->first();
                return view('berita.show', compact('data'));
                break;
        }
    }

    function ekstrakurikuler()
    {
        $data = Ekskuls::all();
        return view('ekstrakurikuler',compact('data'));
    }
    function prestasi()
    {
        $data[0] = Prestasi::where('type',1)->get();
        $data[1] = Prestasi::where('type',2)->get();
        return view('prestasi',compact('data'));
    }
    function kontak()
    {
        return redirect(env('APP_URL').'#kontak');
    }
    function kegiatanSiswa()
    {
        $data = Prestasi::where('type',1)->get();
        return view('kegiatan-siswa',compact('data'));
    }
}
