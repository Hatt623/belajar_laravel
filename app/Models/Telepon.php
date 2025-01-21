<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telepon extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nomor', 'id_pengguna'];
    public $timestamp = true;

    // Relasi one to one ke tabel Penggunas
    public function penggunas()
    {
        return $this->belongsTo(Penggunas::class, 'id_pengguna');
    }
}
