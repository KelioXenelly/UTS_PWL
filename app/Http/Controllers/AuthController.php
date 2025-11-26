<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showSignIn() {
        return view("authentication.signin");
    }
    

    public function signIn(Request $request) {
        // Validate input
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Attempt login
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Jika berhasil, arahkan ke halaman mahasiswa
            return redirect()->route('mahasiswa.index');
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ])->withInput();
    }

    public function showSignUp() {
        return view("authentication.signup");
    }

    public function signUp(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8', 
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Simpan user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah register (opsional)
        Auth::login($user);

        return redirect()->route('mahasiswa.index');
    }

    public function signOut(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign-in'); 
    }
}
