<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategorisController extends Controller
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
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required|min:1|max:20',
        ],
        [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.min' => 'Nama kategori minimal 1 karakter',
            'nama_kategori.max' => 'Nama kategori maksimal 20 karakter',
        ]);

        $kategori = new Kategori;
        //     Nama yang di tabel          nama yang di form
        $kategori->nama_kategori            = $request->nama_kategori;

        $kategori->save();

        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact('kategori'));
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
        $this->validate($request, [
            'nama_kategori' => 'required|min:1|max:20',
        ],
        [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.min' => 'Nama kategori minimal 1 karakter',
            'nama_kategori.max' => 'Nama kategori maksimal 20 karakter',
        ]);

        Kategori::find($id)->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kategori::find($id)->delete();
        return redirect()->route('kategori.index')->with('success', 'Data kategori berhasil dihapus');
    }
}
