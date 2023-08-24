<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TenagaPengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Models\User::where('role', 2)->get();
        return view('admin.profil-sekolah.tenaga-pengajar', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.profil-sekolah.tenaga-pengajar-create');
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
            'nimp' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'picture' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $extension = $request->file('picture')->getClientOriginalExtension();
        $bgImagePath = $request->file('picture')->storeAs('public/tenaga-pengajar_gambar', uniqid() . '.' . $extension);
        $bgImageFileName = basename($bgImagePath);
        $validatedData['picture'] = 'tenaga-pengajar_gambar/' . $bgImageFileName;


        $validatedData['password'] = bcrypt($request->password);
        $validatedData['role'] = 2;
        User::create($validatedData);

        return redirect(route('tenaga-pengajar.index'))->with('success', 'Data pengajar berhasil ditambahkan');
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
        return view('admin.profil-sekolah.tenaga-pengajar-create', ['data' => User::findOrFail($id)]);
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
            'nimp' => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'picture' => 'image|mimes:jpeg,png,jpg',
        ]);

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $extension = $request->file('picture')->getClientOriginalExtension();
            $bgImagePath = $request->file('picture')->storeAs('public/tenaga-pengajar_gambar', uniqid() . '.' . $extension);
            $bgImageFileName = basename($bgImagePath);
            $validatedData['picture'] = 'tenaga-pengajar_gambar/' . $bgImageFileName;
        }

        // Hanya perbarui password jika diisi
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->password);
        }

        $validatedData['role'] = 2;

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect(route('tenaga-pengajar.index'))->with('success', 'Data pengajar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success', 'Data pengajar berhasil dihapus');
    }
}
