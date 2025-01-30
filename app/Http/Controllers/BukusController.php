<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Genre;
use Illuminate\Http\Request;

class BukusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerbit = Penerbit::all();
        $genre = Genre::all();
        return view('buku.create', compact('penerbit', 'genre'));
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
            'nama_buku' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_penerbit' => 'required|exists:penerbits,id',
            'tanggal_terbit' => 'required|date',
            'id_genre' => 'required|exists:genres,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ],
    
        [
            'nama_buku.required' => 'Nama buku wajib diisi',
            'nama_buku.string' => 'Nama buku harus berupa string',
            'nama_buku.max' => 'Nama buku maksimal 255 karakter',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa angka',
            'id_penerbit.required' => 'Penerbit wajib diisi',
            'id_penerbit.exists' => 'Penerbit tidak ditemukan',
            'tanggal_terbit.required' => 'Tanggal terbit wajib diisi',
            'tanggal_terbit.date' => 'Tanggal terbit harus berupa tanggal',
            'id_genre.required' => 'Genre wajib diisi',
            'id_genre.exists' => 'Genre tidak ditemukan',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
            'image.max' => 'Ukuran gambar maksimal 2048 KB'
        ]
        );

        $buku = new Buku;
        //Nama yang di tabel         nama yang di form
        $buku->nama_buku        = $request->nama_buku;
        $buku->harga            = $request->harga;
        $buku->stok             = $request->stok;
        $buku->id_penerbit      = $request->id_penerbit;
        $buku->tanggal_terbit   = $request->tanggal_terbit;
        $buku->id_genre         = $request->id_genre;


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        $genre = Genre::all();
        return view('buku.show', compact('buku','penerbit', 'genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $penerbit = Penerbit::all();
        $genre = Genre::all();
        return view('buku.edit', compact('buku','penerbit', 'genre'));
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
            'nama_buku' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'id_penerbit' => 'required|exists:penerbits,id',
            'tanggal_terbit' => 'required|date',
            'id_genre' => 'required|exists:genres,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ],
    
        [
            'nama_buku.required' => 'Nama buku wajib diisi',
            'nama_buku.string' => 'Nama buku harus berupa string',
            'nama_buku.max' => 'Nama buku maksimal 255 karakter',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok wajib diisi',
            'stok.integer' => 'Stok harus berupa angka',
            'id_penerbit.required' => 'Penerbit wajib diisi',
            'id_penerbit.exists' => 'Penerbit tidak ditemukan',
            'tanggal_terbit.required' => 'Tanggal terbit wajib diisi',
            'tanggal_terbit.date' => 'Tanggal terbit harus berupa tanggal',
            'id_genre.required' => 'Genre wajib diisi',
            'id_genre.exists' => 'Genre tidak ditemukan',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar dengan format jpeg, png, jpg',
            'image.max' => 'Ukuran gambar maksimal 2048 KB'
        ]
        );

        $buku = Buku::FindOrFail($id);
        //Nama yang di tabel         nama yang di form
        $buku->nama_buku        = $request->nama_buku;
        $buku->harga            = $request->harga;
        $buku->stok             = $request->stok;
        $buku->id_penerbit      = $request->id_penerbit;    
        $buku->tanggal_terbit   = $request->tanggal_terbit;
        $buku->id_genre         = $request->id_genre;


        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $name = rand(1000,9999) . $img->getClientOriginalName();
            $img->move('images/buku', $name);
            $buku->image = $name;
        }

        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Data buku berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Buku::destroy($id);
        return redirect()->route('buku.index')->with('success', 'Data buku berhasil dihapus');
    }
}
