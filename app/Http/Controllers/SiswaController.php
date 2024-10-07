<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\NilaiSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index($kelas)
    {
        $siswas = Siswa::where('kelas', $kelas)->with('nilaiSiswa')->get();
        return view('kelas.index', compact('siswas', 'kelas'));

        // Eager loading relasi nilaiSiswa agar bintang tidak kembali 0

    }

    public function store(Request $request)
    {
        $siswa = Siswa::create($request->only('nis', 'nama', 'kelas'));
        NilaiSiswa::create([
            'siswa_id' => $siswa->id,
            'bintang' => 0
        ]);

        return back()->with('success', 'Data siswa berhasil ditambah');
    }

    public function updateBintang(Request $request, $id)
    {
        $nilaiSiswa = NilaiSiswa::where('siswa_id', $id)->first();
        $nilaiSiswa->update(['bintang' => $request->bintang]);

        return response()->json(['success' => 'Nilai berhasil diperbarui']);
    }

    public function edit($id)
{
    $siswa = Siswa::findOrFail($id);
    return view('siswa.edit', compact('siswa'));
}

public function update(Request $request, $id)
{
    $siswa = Siswa::findOrFail($id);
    $siswa->update($request->only('nis', 'nama', 'kelas'));
    return redirect()->route('rpl1')->with('success', 'Data siswa berhasil diperbarui');
}

public function destroy($id)
{
    $siswa = Siswa::findOrFail($id);
    $siswa->delete();
    return redirect()->route('rpl1')->with('success', 'Data siswa berhasil dihapus');
}

public function incrementBintang($id)
{
    $nilaiSiswa = NilaiSiswa::where('siswa_id', $id)->first();

    if ($nilaiSiswa) {
        $nilaiSiswa->increment('bintang');
    } else {
        // Jika tidak ada record, buat baru
        $nilaiSiswa = NilaiSiswa::create([
            'siswa_id' => $id,
            'bintang' => 1,
        ]);
    }

    return response()->json([
        'success' => true,
        'bintang' => $nilaiSiswa->bintang,
    ]);
}



}
