<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilSekolahController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request,$route)
    {
        switch ($route) {
            case 'sejarah':
                $data = \App\Models\Sejarah::select('users.name','sejarahs.*')->join('users','editor','=','users.id')->first();
                break;
            case 'visi-misi':
                $data = \App\Models\VisiMisi::select('users.name','visi_misis.*')->join('users','editor','=','users.id')->first();
                break;
            case 'sarana-prasarana':
                $data = \App\Models\Sarpras::all();
                break;
            case 'tenaga-pengajar':
                $data = \App\Models\User::all();
                break;
        }
        return view('profil-sekolah.'.$route,compact('data'));
    }
}
