<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('welcome', compact('produk'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        $allproduk = Produk::all();
        return view('shopy.show', compact('produk', 'kategori','allproduk'));
    }
}
