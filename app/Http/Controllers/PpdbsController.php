<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;

class PpdbsController extends Controller
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
        $ppdb = Ppdb::all();
        return view('ppdb.index', compact('ppdb'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ppdb.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ppdb = new Ppdb;
        //     Nama yang di tabel          nama yang di form
        $ppdb->nama_lengkap             = $request->nama_lengkap;
        $ppdb->jenis_kelamin            = $request->jenis_kelamin;
        $ppdb->agama                    = $request->agama;
        $ppdb->alamat                   = $request->alamat;
        $ppdb->telpon                   = $request->telpon;
        $ppdb->asal_sekolah             = $request->asal_sekolah;

        $ppdb->save();

        return redirect()->route('ppdb.index')->with('success', 'Data ppdb berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ppdb = Ppdb::FindOrFail($id);
        return view('ppdb.show', compact('ppdb'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ppdb = Ppdb::FindOrFail($id);
        return view('ppdb.edit', compact('ppdb'));
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
        $ppdb = Ppdb::FindOrFail($id);
        //     Nama yang di tabel          nama yang di form
        $ppdb->nama_lengkap             = $request->nama_lengkap;
        $ppdb->jenis_kelamin            = $request->jenis_kelamin;
        $ppdb->agama                    = $request->agama;
        $ppdb->alamat                   = $request->alamat;
        $ppdb->telpon                   = $request->telpon;
        $ppdb->asal_sekolah             = $request->asal_sekolah;

        $ppdb->save();

        return redirect()->route('ppdb.index')->with('success', 'Data ppdb berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppdb = ppdb::FindOrFail($id);
        $ppdb->delete();
        return redirect()->route('ppdb.index')->with('success', 'Data ppdb berhasil dihapus');
    }
}
