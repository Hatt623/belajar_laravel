<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembeli = Pembeli::all();
        return view('pembelian.index', compact('pembeli'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pembeli = Pembeli::all();
        return view('pembelian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
                'nama_pembeli' => 'required|string|max:255',
                'jenis_kelamin' => 'required',
                'telepon' => 'required|string|min:10|max:10',
            ],
        
            [
                'nama_pembeli.required' => 'Nama pembeli wajib diisi',
                'nama_pembeli.string' => 'Nama pembeli harus berupa string',
                'nama_pembeli.max' => 'Nama pembeli maksimal 255 karakter',
                'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
                'telepon.required' => 'Telepon wajib diisi',
                'telepon.string' => 'Telepon harus berupa string',
                'telepon.max' => 'Telepon maksimal 10 karakter',
                'telepon.min' => 'Telepon minimal 10 karakter',
            ]);

        $pembeli = new Pembeli;
        //Nama yang di tabel          nama yang di form
        $pembeli->nama_pembeli        = $request->nama_pembeli;
        $pembeli->jenis_kelamin        = $request->jenis_kelamin;
        $pembeli->telepon        = $request->telepon;
        
        $pembeli->save();

        return redirect()->route('pembelian.index')->with('success', 'Data pembeli berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembelian.show', compact('pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembeli = Pembeli::findOrFail($id);
        return view('pembelian.edit', compact('pembeli'));
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
        $this->validate($request,[
            'nama_pembeli' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'telepon' => 'required|string|min:10|max:10',
        ],
    
        [
            'nama_pembeli.required' => 'Nama pembeli wajib diisi',
            'nama_pembeli.string' => 'Nama pembeli harus berupa string',
            'nama_pembeli.max' => 'Nama pembeli maksimal 255 karakter',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi',
            'telepon.required' => 'Telepon wajib diisi',
            'telepon.string' => 'Telepon harus berupa string',
            'telepon.max' => 'Telepon maksimal 10 karakter',
            'telepon.min' => 'Telepon minimal 10 karakter',
        ]);

        $pembeli = Pembeli::findOrFail($id);
        //Nama yang di tabel          nama yang di form
        $pembeli->nama_pembeli          = $request->nama_pembeli;
        $pembeli->jenis_kelamin         = $request->jenis_kelamin;
        $pembeli->telepon               = $request->telepon;
        
        $pembeli->save();

        return redirect()->route('pembelian.index')->with('success', 'Data pembeli berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembeli::destroy($id);
        return redirect()->route('pembelian.index')->with('success', 'Data pembeli berhasil dihapus');
    }
}
