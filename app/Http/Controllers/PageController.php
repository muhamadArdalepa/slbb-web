<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ekskuls;
use App\Models\Sarpras;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function profileSekolah($route)
    {
        $data = [];
        switch ($route) {
            case 'sarana-prasarana':
                $data = Sarpras::all();
                break;
            case 'tenaga-pengajar':
                $data = User::where('role',1)->get();
                break;
            
            default:
                # code...
                break;
        }
        return view('profile-sekolah.'.$route,compact('data'));
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
