<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genre = Genre::all();
        return view('genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genre = Genre::all();
        return view('genre.create');
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
            'genre' => 'required|min:1|max:20',
        ],
        [
            'genre.required' => 'Nama genre wajib diisi',
            'genre.min' => 'Nama genre minimal 1 karakter',
            'genre.max' => 'Nama genre maksimal 20 karakter',
        ]
        );

        $genre = new Genre;
        //Nama yang di tabel          nama yang di form
        $genre->genre        = $request->genre;
        
        $genre->save();

        return redirect()->route('genre.index')->with('success', 'Data genre berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.show', compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::findOrFail($id);
        return view('genre.edit', compact('genre'));
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
            'genre' => 'required|min:1|max:20',
        ],
        [
            'genre.required' => 'Nama genre wajib diisi',
            'genre.min' => 'Nama genre minimal 1 karakter',
            'genre.max' => 'Nama genre maksimal 20 karakter',
        ]
        );
        
        $genre = Genre::findOrFail($id);
        //Nama yang di tabel          nama yang di form
        $genre->genre        = $request->genre;
        
        $genre->save();

        return redirect()->route('genre.index')->with('success', 'Data genre berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::FindOrFail($id)->delete();
        return redirect()->route('genre.index')->with('success', 'Data genre berhasil dihapus');
    }
}
