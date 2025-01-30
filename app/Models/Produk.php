<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kategori','harga','stok', 'id_kategori'];
    public $timestamp = true;

    // Relasi one to many ke tabel
    public function kategori()
    {
        return $this->belongsTo(Kategori::class ,'id_kategori');
    }

    public function deleteImage(){
        if ($this->cover && file_exists(public_path('images/produk' . $this->cover))) {
            return unlink(public_path('images/produk' . $this->cover));
            
            }
        
        }
}
