<?php

namespace App\Http\Controllers;

use App\Models\Sarpras;
use Illuminate\Http\Request;

class SaranaPrasaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Sarpras::all();
        return view('admin.profil-sekolah.sarana-prasarana',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profil-sekolah.sarana-prasarana-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'title.required' => 'Judul Wajib diisi',
            'body.required' => 'Body Wajib diisi',
        ]);
        $validatedData['editor'] = auth()->user()->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/sarana-prasarana_gambar', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'sarana-prasarana_gambar/'.$bgImageFileName;
        }
        Sarpras::create($validatedData);
        return redirect(route('sarana-prasarana.index'))->with('success','Sarana prasana berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.profil-sekolah.sarana-prasarana-create',['data'=>Sarpras::findOrFail($id)]);
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
            'name' => 'required',
            'desc' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg',
        ],[
            'title.required' => 'Judul Wajib diisi',
            'body.required' => 'Body Wajib diisi',
        ]);
        $validatedData['editor'] = auth()->user()->id;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/sarana-prasarana_gambar', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'sarana-prasarana_gambar/'.$bgImageFileName;
        }
        Sarpras::findOrFail($id)->update($validatedData);
        return redirect(route('sarana-prasarana.index'))->with('success','Data sarana prasana berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sarpras::destroy($id);
        return back()->with('success','Data sarana prasana berhasil dihapus');
    }
}
