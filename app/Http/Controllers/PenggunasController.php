<?php

namespace App\Http\Controllers;

use App\Models\Penggunas;
use Illuminate\Http\Request;

class PenggunasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
     $this->middleware('auth');
    }

    public function index()
    {
        $pengguna = Penggunas::all();
        return view('pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pengguna = new Penggunas;
        //     Nama yang di tabel          nama yang di form
        $pengguna->nama             = $request->nama;

        $pengguna->save();

        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = Penggunas::FindOrFail($id);
        return view('pengguna.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = Penggunas::FindOrFail($id);
        return view('pengguna.edit', compact('pengguna'));
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
        Penggunas::FindOrFail($id)->update($request->all());
        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penggunas::FindOrFail($id)->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil dihapus');
    }
}
