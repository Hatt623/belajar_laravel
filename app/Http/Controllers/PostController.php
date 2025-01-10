<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Barang;

class PostController extends Controller
{
    public function Menampilkan(){
            // $post = Post::where('title', 'LIKE', '%pintar%')->get(); (BERDASARKAN STRING)
            // $post = Post::where('id', 3)->get();                     (BERDASARKAN ID)
        
            $post = Post::all();
            return view('tampil_post', compact('post'));
        
    }

    public function Menampilkan2(){
        $barang = Barang::all();
    return view('tampil_barang', compact('barang'));
    
    }

}
