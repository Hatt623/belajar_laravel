<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProduksController extends Controller
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
        $produk = Produk::all();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('produk.create', compact('kategori'));
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
            'nama_produk' => 'required|min:1|max:20',
            'id_kategori' => 'required|min:1|max:20',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ],
        [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'nama_produk.min' => 'Nama produk minimal 1 karakter',
            'nama_produk.max' => 'Nama produk maksimal 20 karakter',
            'id_kategori.required' => 'id_kategori wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok wajib diisi',
            'stok.numeric' => 'Stok harus berupa angka',
            'cover.required' => 'Cover wajib diisi',
            'cover.image' => 'File yang diupload harus berupa gambar',
            'cover.mimes' => 'File yang diupload harus berupa jpeg, png, jpg, gif, svg'
        ]
        );

        $produk = new Produk;
        //Nama yang di tabel         nama yang di form
        $produk->nama_produk        = $request->nama_produk;
        $produk->harga              = $request->harga;
        $produk->stok               = $request->stok;
        $produk->id_kategori        = $request->id_kategori;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/produk', $name);
            $produk->cover = $name;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.show', compact('produk', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
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
            'nama_produk' => 'required|min:1|max:20',
            'id_kategori' => 'required|min:1|max:20',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',

        ],
        [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'nama_produk.min' => 'Nama produk minimal 1 karakter',
            'nama_produk.max' => 'Nama produk maksimal 20 karakter',
            'id_kategori.required' => 'id_kategori wajib diisi',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok wajib diisi',
            'stok.numeric' => 'Stok harus berupa angka'
        ]
        );
        
        $produk = Produk::FindOrFail($id);
        //Nama yang di tabel         nama yang di form
        $produk->nama_produk        = $request->nama_produk;
        $produk->harga              = $request->harga;
        $produk->stok               = $request->stok;
        $produk->id_kategori        = $request->id_kategori;

        if ($request->hasFile('cover')) {
            $produk->deleteImage();
            $img = $request->file('cover');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/produk', $name);
            $produk->cover = $name;
        }

        $produk->save();

        return redirect()->route('produk.index')->with('success', 'Data produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect()->route('produk.index')->with('success', 'Data produk berhasil dihapus');
    }
}
