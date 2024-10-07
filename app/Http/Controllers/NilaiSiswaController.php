<?php

namespace App\Http\Controllers;

use App\Models\NilaiSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    public function update(Request $request, Siswa $siswa)
    {
        $nilai = $siswa->nilaiSiswa;
        $nilai->bintang = $request->input('bintang');
        $nilai->save();

        return redirect()->route('dashboard');
    }
}

