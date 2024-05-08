<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absen;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
         // Mendapatkan data absensi berdasarkan tanggal terbaru dan nama karyawan dari A sampai Z
         $absensi = Absen::with('karyawan')
         ->when($request->filled('tanggal_dari') && $request->filled('tanggal_sampai'), function ($query) use ($request) {
             $query->whereBetween('tanggal', [$request->tanggal_dari, $request->tanggal_sampai]);
         })
         ->orderBy('tanggal', 'desc')
         ->join('karyawan', 'absen.id_karyawan', '=', 'karyawan.id_karyawan')
         ->orderBy('karyawan.nama', 'asc')
         ->get();
        
        // Mengirim data absen ke view laporan
        return view('laporan', ['absensi' => $absensi]);
    }

    public function filter(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal_dari' => 'required|date',
            'tanggal_sampai' => 'required|date|after_or_equal:tanggal_dari',
        ]);

        // Ambil tanggal dari request
        $tanggalDari = $request->tanggal_dari;
        $tanggalSampai = $request->tanggal_sampai;

        // Filter data absensi berdasarkan rentang tanggal
        $absensi = Absen::whereBetween('tanggal', [$tanggalDari, $tanggalSampai])->get();
        
        // Mengirim data absen yang sudah difilter ke view laporan
        return view('laporan', ['absensi' => $absensi]);
    }
}
