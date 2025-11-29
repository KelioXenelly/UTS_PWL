<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view ('users.indexusers', ['users' => User::all()] );
    }

    public function create() {
        return view('users.createusers');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:Mahasiswa,Dosen,Admin',
        ]);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function show($id) {
        $user = User::find($id);

        if(!$user) {
            return redirect()->route('users.index')
                ->with('error', 'User Tidak Ditemukan');
        }

        return view('users.updateusers', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if(!$user) {
            return redirect()->route('users.index')
                ->with('error', 'User Tidak Ditemukan');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:Mahasiswa,Dosen,Admin',
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')
            ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id) {
        $user = User::find($id);

        if(!$user) {
            return redirect()->route('users.index')
                ->with('error', 'User Tidak Ditemukan');
        }

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User berhasil dihapus.');
    }
}
