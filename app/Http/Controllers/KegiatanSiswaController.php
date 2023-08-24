<?php

namespace App\Http\Controllers;

use App\Models\KegiatanSiswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KegiatanSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kelas = Kelas::findOrFail($request->kelas);
        return view('kegiatan-siswa-create',compact('kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kelas = Kelas::find($request->kelas_id);
        $validatedData = $request->validate([
            'kelas_id' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'title.required' => 'Judul Wajib diisi',
            'desc.required' => 'Deskripsi Wajib diisi',
        ]);
        $validatedData['editor'] = auth()->user()->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/kegiatan-siswa', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'kegiatan-siswa/' . $bgImageFileName;
        }
        KegiatanSiswa::create($validatedData);
        return redirect(route('kegiatan-siswa.show',$kelas->name))->with('success', 'kegiatan siswa berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $kelas = Kelas::where('name',$name)->first();
        $data = KegiatanSiswa::where('kelas_id',$kelas->id)->get();
        return view('kegiatan-siswa-show',compact('kelas','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
