<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [NilaiSiswaController::class, 'index'])->name('dashboard');
Route::resource('siswas', SiswaController::class);
Route::post('siswas/{siswa}/nilai', [NilaiSiswaController::class, 'update'])->name('nilai.update');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/rpl1', [SiswaController::class, 'index'])->name('rpl1')->defaults('kelas', 'RPL 1');
Route::get('/rpl2', [SiswaController::class, 'index'])->name('rpl2')->defaults('kelas', 'RPL 2');

Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::post('/siswa/{id}/update-bintang', [SiswaController::class, 'updateBintang'])->name('siswa.updateBintang');

Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::post('/siswa/{id}/increment-bintang', [SiswaController::class, 'incrementBintang'])->name('siswa.incrementBintang');
