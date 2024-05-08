<?php

namespace App\Http\Controllers;

use App\Models\Absen;; 
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil total kehadiran karyawan dari seluruh data absensi
        $totalHadir = Absen::where('status', 'Hadir')->count();
        
        // Mengambil data absensi untuk bulan terbaru
        $bulanIni = Carbon::now()->format('Y-m');
        $absenBulanIni = Absen::whereYear('tanggal', Carbon::now()->year)
                                  ->whereMonth('tanggal', Carbon::now()->month)
                                  ->get();
        // Menghitung jumlah karyawan yang hadir, izin, dan absen pada bulan terbaru
        $jumlahHadir = $absenBulanIni->where('status', 'Hadir')->count();
        $jumlahIzin = $absenBulanIni->where('status', 'izin')->count();
        $jumlahAbsen = $absenBulanIni->where('status', 'absen')->count();

        return view('dashboard', compact('totalHadir', 'jumlahHadir', 'jumlahIzin', 'jumlahAbsen'));
    }
}
