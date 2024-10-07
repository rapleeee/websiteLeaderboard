<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSiswa extends Model
{
    use HasFactory;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'siswa_id',
        'bintang',
    ];

    // Relasi ke Siswa (belongsTo karena NilaiSiswa milik satu siswa)
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}

