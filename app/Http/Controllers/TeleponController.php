<?php

namespace App\Http\Controllers;

use App\Models\Telepon;
use App\Models\Penggunas;
use Illuminate\Http\Request;

class TeleponController extends Controller
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
        $telepon = Telepon::all();
        return view('telepon.index', compact('telepon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengguna = Penggunas::all();
        return view('telepon.create', compact('pengguna'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $telepon = new Telepon;
        //Nama yang di tabel          nama yang di form
        $telepon->nomor             = $request->nomor;
        $telepon->id_pengguna       = $request->id_pengguna;

        $telepon->save();

        return redirect()->route('telepon.index')->with('success', 'Data telepon berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $telepon = Telepon::findOrFail($id);
        $pengguna = Penggunas::all();
        return view('telepon.show', compact('telepon', 'pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $telepon = Telepon::findOrFail($id);
        $pengguna = Penggunas::all();
        return view('telepon.edit', compact('telepon', 'pengguna'));
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
        $telepon = Telepon::findOrFail($id);
        //Nama yang di tabel        nama yang di form
        $telepon->nomor             = $request->nomor;
        $telepon->id_pengguna       = $request->id_pengguna;

        $telepon->save();

        session()->flash('success', 'Data telepon berhasil diupdate');
        return redirect()->route('telepon.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Telepon::FindOrFail($id)->delete();
        return redirect()->route('telepon.index')->with('success', 'Data Telepon berhasil dihapus');
    }
}
