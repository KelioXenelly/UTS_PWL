<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index() {
        $mataKuliahs = Matakuliah::get(); 

        return view('matakuliah.matakuliah', [
            'mataKuliahs' => $mataKuliahs,
        ]);
    }

    public function create() {
        return view('matakuliah.creatematakuliah');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'nama_matakuliah' => 'required|string|max:255',
        ]);

        Matakuliah::create($validated);

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah Berhasil Ditambahkan.');
    }

    public function show($id) {
        $mataKuliah = Matakuliah::find($id);

        if(!$mataKuliah) {
            return redirect()->route('mata-kuliah.index')
            ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }

        return view('matakuliah.updatematakuliah', [
            'mataKuliah' => $mataKuliah,
        ]);
    }

    public function update(Request $request, $id) {
        $mataKuliah = Matakuliah::find($id);

        if(!$mataKuliah) {
            return redirect()->route('mata-kuliah.index')
            ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }

        $validated = $request->validate([
            'kode' => 'required|string|max:255',
            'nama_matakuliah' => 'required|string|max:255',
        ]); 

        $mataKuliah->update($validated);

        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah Berhasil Diperbarui');
    }

    public function delete($id) {
        $mataKuliah = Matakuliah::find($id);

        if(!$mataKuliah) {
            return redirect()->route('mata-kuliah.index')
            ->with('error', 'Mata Kuliah Tidak Ditemukan');
        }

        $mataKuliah->delete();
        
        return redirect()->route('mata-kuliah.index')
            ->with('success', 'Mata Kuliah Berhasil Dihapus');
    }
}
