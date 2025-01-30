<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name_product' => 'required|min:1|max:20',
            'merk' => 'required|min:1|max:20',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'

        ],
        [
            'name_product.required' => 'Nama produk wajib diisi',
            'name_product.min' => 'Nama produk minimal 1 karakter',
            'name_product.max' => 'Nama produk maksimal 20 karakter',
            'merk.required' => 'Merk wajib diisi',
            'merk.min' => 'Merk minimal 1 karakter',
            'merk.max' => 'Merk maksimal 20 karakter',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Harga harus berupa angka',
            'stock.required' => 'Stok wajib diisi',
            'stock.numeric' => 'Stok harus berupa angka'
        ]
        );

        $product = new Product;
        //     Nama yang di tabel          nama yang di form
        $product->name_product              = $request->name_product;
        $product->merk                      = $request->merk;
        $product->price                     = $request->price;
        $product->stock                     = $request->stock;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Data produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::FindOrFail($id);
        return view('product.edit', compact('product'));
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
            'name_product' => 'required|min:1|max:20',
            'merk' => 'required|min:1|max:20',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'

        ],
        [
            'name_product.required' => 'Nama produk wajib diisi',
            'name_product.min' => 'Nama produk minimal 1 karakter',
            'name_product.max' => 'Nama produk maksimal 20 karakter',
            'merk.required' => 'Merk wajib diisi',
            'merk.min' => 'Merk minimal 1 karakter',
            'merk.max' => 'Merk maksimal 20 karakter',
            'price.required' => 'Harga wajib diisi',
            'price.numeric' => 'Harga harus berupa angka',
            'stock.required' => 'Stok wajib diisi',
            'stock.numeric' => 'Stok harus berupa angka'
        ]
        );
        
        $product = Product::findOrFail($id);
        //     Nama yang di tabel          nama yang di form
        $product->name_product              = $request->name_product;
        $product->merk                      = $request->merk;
        $product->price                     = $request->price;
        $product->stock                     = $request->stock;

        $product->save();

        return redirect()->route('product.index')->with('success', 'Data produk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Data produk berhasil dihapus');
    }
}
