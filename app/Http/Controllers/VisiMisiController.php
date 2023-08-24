<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = VisiMisi::select('users.name', 'visi_misis.*')->join('users', 'editor', '=', 'users.id')->first();
        return view('admin.profil-sekolah.visi-misi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $validatedData = $request->validate([
            'visi' => 'required',
            'misi' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'visi.required' => 'Visi Wajib diisi',
            'misi.required' => 'Misi Wajib diisi',
            'body.required' => 'Body Wajib diisi',
        ]);
        $validatedData['editor'] = auth()->user()->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/visi-misi', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'visi-misi/' . $bgImageFileName;
        }
        VisiMisi::first()->update($validatedData);
        return back()->with('success', 'Halaman visi dan misi berhasil diubah');
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
