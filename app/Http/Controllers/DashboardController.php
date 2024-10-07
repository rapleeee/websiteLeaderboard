<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\NilaiSiswa;

class DashboardController extends Controller
{
    public function index()
    {
        // Gabungan leaderboard RPL 1 dan RPL 2
        $leaderboard_gabungan = Siswa::join('nilai_siswas', 'siswas.id', '=', 'nilai_siswas.siswa_id')
            ->select('siswas.*', 'nilai_siswas.bintang')
            ->orderBy('nilai_siswas.bintang', 'desc')
            ->take(5)
            ->get();

        // Leaderboard per kelas
        $leaderboard_rpl1 = Siswa::join('nilai_siswas', 'siswas.id', '=', 'nilai_siswas.siswa_id')
            ->where('kelas', 'RPL 1')
            ->select('siswas.*', 'nilai_siswas.bintang')
            ->orderBy('nilai_siswas.bintang', 'desc')
            ->take(5)
            ->get();

        $leaderboard_rpl2 = Siswa::join('nilai_siswas', 'siswas.id', '=', 'nilai_siswas.siswa_id')
            ->where('kelas', 'RPL 2')
            ->select('siswas.*', 'nilai_siswas.bintang')
            ->orderBy('nilai_siswas.bintang', 'desc')
            ->take(5)
            ->get();

        return view('dashboard', compact('leaderboard_gabungan', 'leaderboard_rpl1', 'leaderboard_rpl2'));
    }
}
