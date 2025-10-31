<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index() {
        $mataKuliahs = Matakuliah::get();
        
        $mahasiswas = Mahasiswa::get();

        return view('absensi.absensi', [
            'mataKuliahs' => $mataKuliahs,
            'mahasiswas' => $mahasiswas,
            // 'absensis' => $absensi,
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'mahasiswa_id' => 'required|integer|exists:mahasiswas,id',
            'matakuliah_id' => 'required|integer|exists:matakuliah,id',
            'tanggal_absensi' => 'required|date',
        ]);

        Absensi::updateOrCreate([
            $validated,
            'status_absen' => $request->input('status_absen'),
        ]);

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah Berhasil Ditambahkan.');
    }

    // public function show($id) {
    //     $mataKuliah = Matakuliah::find($id);

    //     if(!$mataKuliah) {
    //         return redirect()->route('mata-kuliah.index')
    //         ->with('error', 'Mata Kuliah Tidak Ditemukan');
    //     }

    //     return view('matakuliah.updatematakuliah', [
    //         'mataKuliah' => $mataKuliah,
    //     ]);
    // }

    // public function update(Request $request, $id) {
    //     $mataKuliah = Matakuliah::find($id);

    //     if(!$mataKuliah) {
    //         return redirect()->route('mata-kuliah.index')
    //         ->with('error', 'Mata Kuliah Tidak Ditemukan');
    //     }

    //     $validated = $request->validate([
    //         'kode' => 'required|string|max:255',
    //         'nama_matakuliah' => 'required|string|max:255',
    //     ]); 

    //     $mataKuliah->update($validated);

    //     return redirect()->route('mata-kuliah.index')
    //         ->with('success', 'Mata Kuliah Berhasil Diperbarui');
    // }

    // public function delete($id) {
    //     $mataKuliah = Matakuliah::find($id);

    //     if(!$mataKuliah) {
    //         return redirect()->route('mata-kuliah.index')
    //         ->with('error', 'Mata Kuliah Tidak Ditemukan');
    //     }

    //     $mataKuliah->delete();
        
    //     return redirect()->route('mata-kuliah.index')
    //         ->with('success', 'Mata Kuliah Berhasil Dihapus');
    // }
}
