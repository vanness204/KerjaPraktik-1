<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

// dasboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Data Karyawan
Route::get('/data-karyawan', [KaryawanController::class, 'index'])->name('data-karyawan'); // Rute untuk menampilkan data karyawan
Route::post('/simpan-karyawan', [KaryawanController::class, 'simpanKaryawan'])->name('simpan-karyawan'); // Rute untuk menyimpan data karyawan baru
// Route untuk menghapus karyawan
Route::delete('/karyawan/{id}', [KaryawanController::class, 'hapus'])->name('hapus-karyawan');

// Absensi
// Menampilkan formulir absensi
Route::get('/absen', [AbsenController::class, 'index'])->name('absen');
// Menyimpan data absensi baru
Route::post('/simpan-absensi', [AbsenController::class, 'simpanAbsensi'])->name('simpan-absensi');


//laporan
Route::get('/laporan', [LaporanController::class, 'laporan'])->name('laporan');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::post('/laporan/filter', [LaporanController::class, 'filter'])->name('laporan.filter');
//profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Mendefinisikan rute untuk menyimpan data karyawan baru
Route::post('/simpan-karyawan', [KaryawanController::class, 'simpanKaryawan'])->name('simpan-karyawan');

require __DIR__.'/auth.php';

