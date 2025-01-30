<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Buku;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class TransaksisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        $pembeli = Pembeli::all();
        return view('transaksi.create', compact('buku', 'pembeli'));
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
            'jumlah' => 'required|integer|max:100',
            'tanggal_transaksi' => 'required|date',
            'id_buku' => 'required|exists:bukus,id',
            'id_pembeli' => 'required|exists:pembelis,id',
        ],

        [
            'jumlah.required' => 'Jumlah wajib diisi',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi',
            'tanggal_transaksi.date' => 'Tanggal transaksi harus berupa tanggal',
            'id_buku.required' => 'Buku wajib diisi',
            'id_buku.max' => 'Jumlah maksimal 100',
            'id_buku.exists' => 'Buku tidak ditemukan',
            'id_pembeli.required' => 'Pembeli wajib diisi',
            'id_pembeli.exists' => 'Pembeli tidak ditemukan',
        ]
        );

        $transaksi = new Transaksi;
        //Nama yang di tabel                nama yang di form
        $transaksi->jumlah                   = $request->jumlah;
        $transaksi->tanggal_transaksi        = $request->tanggal_transaksi;
        $transaksi->id_buku                  = $request->id_buku;
        $transaksi->id_pembeli               = $request->id_pembeli;

        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $buku = Buku::all();
        $pembeli = Pembeli::all();
        return view('transaksi.show', compact('transaksi', 'buku', 'pembeli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $buku = Buku::all();
        $pembeli = Pembeli::all();
        return view('transaksi.edit', compact('transaksi', 'buku', 'pembeli'));
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
            'jumlah' => 'required|integer|max:100',
            'tanggal_transaksi' => 'required|date',
            'id_buku' => 'required|exists:buku,id',
            'id_pembeli' => 'required|exists:pembeli,id',
        ],
        [
            'jumlah.required' => 'Jumlah wajib diisi',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tanggal_transaksi.required' => 'Tanggal transaksi wajib diisi',
            'tanggal_transaksi.date' => 'Tanggal transaksi harus berupa tanggal',
            'id_buku.required' => 'Buku wajib diisi',
            'id_buku.max' => 'Jumlah maksimal 100',
            'id_buku.exists' => 'Buku tidak ditemukan',
            'id_pembeli.required' => 'Pembeli wajib diisi',
            'id_pembeli.exists' => 'Pembeli tidak ditemukan',
        ]
        );

        $transaksi = Transaksi::findOrFail($id);
        //Nama yang di tabel                nama yang di form
        $transaksi->jumlah                   = $request->jumlah;
        $transaksi->tanggal_transaksi        = $request->tanggal_transaksi;
        $transaksi->id_buku                  = $request->id_buku;
        $transaksi->id_pembeli               = $request->id_pembeli;

        $transaksi->save();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaksi::destroy($id);
        return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil dihapus');
    }
}
