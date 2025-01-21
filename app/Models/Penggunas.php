<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggunas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'nama'];
    public $timestamp = true;

    // Relasi one to one ke tabel
    public function telepon()
    {
        return $this->hasOne(Telepon::class);
    }
}
