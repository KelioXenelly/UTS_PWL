<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request) {
        $mataKuliahs = Matakuliah::all();
        $mahasiswas = collect(); // kosong dulu
        $selectedMatkul = $request->matakuliah_id;
        $selectedDate = $request->tanggal_absensi;

        // Kalau user sudah pilih tanggal & MK → tampilkan daftar mahasiswa
        if ($selectedMatkul && $selectedDate) {
            $mahasiswas = Mahasiswa::all();

            // Ambil absensi yang sudah ada (untuk ditampilkan di radio)
            $existingAbsensi = Absensi::where('matakuliah_id', $selectedMatkul)
                ->where('tanggal_absensi', $selectedDate)
                ->get()
                ->keyBy('mahasiswa_id'); // biar mudah akses nanti di Blade

            return view('absensi.absensi', compact('mataKuliahs', 'mahasiswas', 'selectedMatkul', 'selectedDate', 'existingAbsensi'));
        }

        // Jika belum pilih filter
        return view('absensi.absensi', compact('mataKuliahs', 'mahasiswas', 'selectedMatkul', 'selectedDate'));
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'tanggal_absensi' => 'required|date',
            'matakuliah_id' => 'required|exists:matakuliah,id',
            'status' => 'required|array',
        ]);

        $tanggal = $validated['tanggal_absensi'];
        $matakuliah_id = $validated['matakuliah_id'];

        foreach ($validated['status'] as $mahasiswa_id => $status) {
            Absensi::updateOrCreate(
                [
                    'mahasiswa_id' => $mahasiswa_id,
                    'matakuliah_id' => $matakuliah_id,
                    'tanggal_absensi' => $tanggal,
                ],
                ['status_absen' => $status]
            );
        }

        return redirect()->route('absensi.index', [
            'tanggal_absensi' => $tanggal,
            'matakuliah_id' => $matakuliah_id,
        ])->with('success', 'Data absensi berhasil disimpan!');
    }
}