<?php

namespace App\Http\Controllers;

use App\Models\Ekskuls;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\Ekskuls::all();
        return view('admin.ekstrakurikuler',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ekstrakurikuler-create');
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
            $bgImagePath = $request->file('img')->storeAs('public/ekstrakurikuler', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'ekstrakurikuler/'.$bgImageFileName;
        }
        Ekskuls::create($validatedData);
        return redirect(route('ekstrakurikuler.index'))->with('success','Ekstrakurikuler berhasil ditambah');
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
        return view('admin.ekstrakurikuler-create',['data'=>Ekskuls::findOrFail($id)]);
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
            $bgImagePath = $request->file('img')->storeAs('public/ekstrakurikuler', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['img'] = 'ekstrakurikuler/'.$bgImageFileName;
        }
        Ekskuls::findOrFail($id)->update($validatedData);
        return redirect(route('ekstrakurikuler.index'))->with('success','Data Ekstrakurikuler berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ekskuls::destroy($id);
        return back()->with('success','Data Ekstrakurikuler berhasil dihapus');
    }
}
