<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Prestasi::orderBy('year', 'desc')->get();
        return view('admin.prestasi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prestasi-create');
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
            'rank' => 'required',
            'year' => 'required',
            'type' => 'required',
            'name' => 'required'
        ]);
        $validatedData['editor'] = auth()->user()->id;
        Prestasi::create($validatedData);
        return redirect(route('prestasi.index'))->with('success', 'Data prestasi berhasil ditambah');
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
        return view('admin.prestasi-create', ['data' => Prestasi::findOrFail($id)]);
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
            'rank' => 'required',
            'year' => 'required',
            'type' => 'required',
            'name' => 'required'
        ]);
        $validatedData['editor'] = auth()->user()->id;
        Prestasi::find($id)->update($validatedData);
        return redirect(route('prestasi.index'))->with('success', 'Data prestasi berhasil ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prestasi::destroy($id);
        return back()->with('success', 'Data prestasi berhasil dihapus');
    }
}
