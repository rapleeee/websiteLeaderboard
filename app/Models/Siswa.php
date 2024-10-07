<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model

{
    use HasFactory;



    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
    ];

    public function nilaiSiswa()
    {
        return $this->hasOne(NilaiSiswa::class);
    }
}

