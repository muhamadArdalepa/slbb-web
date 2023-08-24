<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class UpdatePages extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        switch ($request->page) {
            case 'sejarah':
                
                break;
            case 'visi-misi':
                $validatedData = $request->validate([
                    'visi' => 'required',
                    'misi' => 'required',
                    'img' => 'nullable|image|mimes:jpeg,png,jpg',
                ],[
                    'visi.required' => 'Visi Wajib diisi',
                    'misi.required' => 'Misi Wajib diisi',
                    'body.required' => 'Body Wajib diisi',
                ]);
                $validatedData['editor'] = auth()->user()->id;
                if ($request->hasFile('img') && $request->file('img')->isValid()) {
                    $extension = $request->file('img')->getClientOriginalExtension();
                    $bgImagePath = $request->file('img')->storeAs('public/visi-misi_gambar', uniqid() . '.' . $extension);
                    $bgImageFileName = basename($bgImagePath);
                    $validatedData['img'] = 'visi-misi_gambar/'.$bgImageFileName;
                }
                VisiMisi::first()->update($validatedData);
                return back()->with('success','Halaman visi dan misi berhasil diubah');
                break;

            default:
                # code...
                break;
        }
    }
}
