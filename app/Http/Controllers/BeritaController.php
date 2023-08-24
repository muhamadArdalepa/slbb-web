<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Sejarah;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Berita::with('user');
        if ($request->has('terms')) {
            $query->where('title', 'LIKE', '%' . $request->terms . '%');
        }
        $data = $query->get();
        return view('berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.berita.berita-create');
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
            'title' => 'required',
            'body' => 'required',
            'img' => 'nullable|image|mimes:jpeg,png,jpg',
        ], [
            'title.required' => 'Judul Wajib diisi',
            'body.required' => 'Body Wajib diisi',
        ]);
        $validatedData['editor'] = auth()->user()->id;
        $strippedBody = strip_tags($validatedData['body']);
        $validatedData['excerp'] = substr($strippedBody, 0, 100) .'...';
        $validatedData['slug'] = Str::slug($validatedData['title']) . '-' . uniqid();
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            $extension = $request->file('img')->getClientOriginalExtension();
            $bgImagePath = $request->file('img')->storeAs('public/berita', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'berita/' . $bgImageFileName;
        }
        Berita::create($validatedData);
        return redirect(route('berita.index'))->with('success', 'Berita berhasil ditambah diubah');
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
