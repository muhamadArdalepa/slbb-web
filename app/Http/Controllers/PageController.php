<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Ekskuls;
use App\Models\Sarpras;
use App\Models\Sejarah;
use App\Models\Prestasi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class PageController extends Controller
{

    public function index()
    {
        $page = 'Home';
        $berita = Berita::latest()->limit(3)->get();
        $galeri = Galeri::latest()->get();
        $ekskul = Ekskuls::latest()->limit(6)->get();
        return view('home', compact('page', 'berita','ekskul','galeri'));
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
                $data = Galeri::latest()->get();
                return view('berita.galeri',compact('data'));
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
    function kegiatanSiswa(Request $request)
    {
        $sdlb =  Kelas::where('jenjang','sdlb');
        $smplb =  Kelas::where('jenjang','smplb');
        $smalb =  Kelas::where('jenjang','smalb');

        if($request->has('terms')){
            $sdlb->where('name','LIKE','%'.$request->terms.'%');
            $smplb->where('name','LIKE','%'.$request->terms.'%');
            $smalb->where('name','LIKE','%'.$request->terms.'%');
        }

        $data = [
            $sdlb->get(),
            $smplb->get(),
            $smalb->get(),
        ];

        return view('kegiatan-siswa',compact('data'));
    }
}
