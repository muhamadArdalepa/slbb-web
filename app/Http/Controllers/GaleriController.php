<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Galeri::latest()->get();
        return view('admin.berita.galeri',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.galeri-create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ],[
            'title.required' => 'Judul Wajib diisi',
            'desc.required' => 'desc Wajib diisi',
            'img.required' => 'gambar Wajib diisi',
        ]);

        $validatedData['editor'] = auth()->user()->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/galeri', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'galeri/'.$bgImageFileName;
        }
        Galeri::create($validatedData);
        return redirect(route('galeri.index'))->with('success','Foto galeri berhasil ditambah');
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
        return view('admin.berita.galeri-create',['data'=>Galeri::findOrFail($id)]);
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
            'title' => 'required',
            'desc' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'title.required' => 'Judul Wajib diisi',
            'desc.required' => 'desc Wajib diisi',
            'img.required' => 'gambar Wajib diisi',
        ]);

        $validatedData['editor'] = auth()->user()->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/galeri', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'galeri/'.$bgImageFileName;
        }
        Galeri::findOrFail($id)->update($validatedData);
        return redirect(route('galeri.index'))->with('success','Galeri berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Galeri::destroy($id);
        return back()->with('success','Foto berhasil dihapus');
    }
}
