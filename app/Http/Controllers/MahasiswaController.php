<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('IndexMahasiswa', ['mahasiswas' => Mahasiswa::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createMahasiswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mahasiswa::create([
            'name' => $request->name,
            'NIM' => $request->NIM,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jurusan' => $request->jurusan,
            'angkatan' => $request->angkatan
        ]);

        $username = $request->name;
        $usernameLower = strtolower($username);
        $usernameFormatted = preg_replace('/\s+/', '.', $usernameLower);
        $email = $usernameFormatted . '@gmail.com';

        User::create([
            'name' => $username,
            'email' => $email,
            'password' => 'user1234',
        ]);

        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa Tidak Ditemukan');
        }

        return view('updatemahasiswa', [
            'mahasiswa' => $mahasiswa,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa tidak ditemukan');
        }

        $validated = $request->validate([
            'NIM'           => 'required|string|max:255',
            'name'          => 'required|string|max:255',
            'tempat_lahir'  => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jurusan'       => 'required|in:Bisnis Digital,Sistem dan Teknologi Informasi,Kewirausahaan',
            'angkatan'      => 'required|integer|min:1500|max:2099',
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        if(!$mahasiswa) {
            return redirect()->route('mahasiswa.index')
                ->with('error', 'Mahasiswa tidak ditemukan');
        }

        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Dihapus');
    }
}
