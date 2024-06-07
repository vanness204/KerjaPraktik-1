<?php

namespace App\Http\Controllers;

use App\Models\Absen;
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

        // Menghitung jumlah karyawan yang hadir, izin, dan absen pada hari ini
        $hariIni = Carbon::now()->format('Y-m-d');
        $absenHariIni = Absen::whereDate('tanggal', $hariIni)->get();
        $jumlahHadirHariIni = $absenHariIni->where('status', 'Hadir')->count();
        $jumlahIzinHariIni = $absenHariIni->where('status', 'izin')->count();
        $jumlahAbsenHariIni = $absenHariIni->where('status', 'absen')->count();

        // Menghitung jumlah karyawan yang hadir, izin, dan absen pada tahun ini
        $tahunIni = Carbon::now()->format('Y');
        $absenTahunIni = Absen::whereYear('tanggal', $tahunIni)->get();
        $jumlahHadirTahunIni = $absenTahunIni->where('status', 'Hadir')->count();
        $jumlahIzinTahunIni = $absenTahunIni->where('status', 'izin')->count();
        $jumlahAbsenTahunIni = $absenTahunIni->where('status', 'absen')->count();

        return view('dashboard', compact(
            'totalHadir',
            'jumlahHadir',
            'jumlahIzin',
            'jumlahAbsen',
            'jumlahHadirHariIni',
            'jumlahIzinHariIni',
            'jumlahAbsenHariIni',
            'jumlahHadirTahunIni',
            'jumlahIzinTahunIni',
            'jumlahAbsenTahunIni'
        ));
    }
}