<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ekskuls;
use App\Models\Sarpras;
use App\Models\Sejarah;
use App\Models\Prestasi;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function profilSekolah($route)
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
            case 'tenaga-pengajar':
                $data = User::where('role',1)->get();
                break;
        }
        return view('profil-sekolah.'.$route,compact('data'));
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
        $data = Prestasi::where('type',1)->get();
        return view('kontak',compact('data'));
    }
    function kegiatanSiswa()
    {
        $data = Prestasi::where('type',1)->get();
        return view('kegiatan-siswa',compact('data'));
    }
}
