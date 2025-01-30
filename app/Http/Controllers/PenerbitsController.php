<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        return view('penerbit.create');
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
            'nama_penerbit' => 'required|min:1|max:20',
        ],
        [
            'nama_penerbit.required' => 'Nama penerbit wajib diisi',
            'nama_penerbit.min' => 'Nama penerbit minimal 1 karakter',
            'nama_penerbit.max' => 'Nama penerbit maksimal 20 karakter',
        ]
        );

        $penerbit = new Penerbit;
        //Nama yang di tabel          nama yang di form
        $penerbit->nama_penerbit        = $request->nama_penerbit;
        
        $penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.show', compact('penerbit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penerbit = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('penerbit'));
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
            'nama_penerbit' => 'required|min:1|max:20',
        ],
        [
            'nama_penerbit.required' => 'Nama penerbit wajib diisi',
            'nama_penerbit.min' => 'Nama penerbit minimal 1 karakter',
            'nama_penerbit.max' => 'Nama penerbit maksimal 20 karakter',
        ]
        );

        $penerbit = Penerbit::FindOrFail($id);
        //Nama yang di tabel          nama yang di form
        $penerbit->nama_penerbit       = $request->nama_penerbit;

        $penerbit->save();

        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil dipdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerbit::FindOrFail($id)->delete();
        return redirect()->route('penerbit.index')->with('success', 'Data penerbit berhasil dihapus');
    }
}
