<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest'])->group(function () {
    Route::get('/sign-in', [AuthController::class,'showSignIn'])->name('sign-in-form');
    Route::get('/sign-in/process', [AuthController::class,'signIn'])->name('sign-in');
    Route::get('/sign-up', [AuthController::class,'showSignUp'])->name('sign-up-form');
    Route::post('/sign-up/process', [AuthController::class,'signUp'])->name('sign-up');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/sign-out', [AuthController::class,'signOut'])->name('sign-out');
    
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create-form');
    Route::post('/mahasiswa/store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'show'])->name('mahasiswa.update-form');
    Route::patch('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');
    
    Route::get('/mata-kuliah', [MataKuliahController::class, 'index'])->name('mata-kuliah.index');
    Route::get('/mata-kuliah/create', [MataKuliahController::class, 'create'])->name('mata-kuliah.create');
    Route::post('/mata-kuliah/store', [MataKuliahController::class, 'store'])->name('mata-kuliah.store');
    Route::get('/mata-kuliah/edit/{id}', [MataKuliahController::class, 'show'])->name('mata-kuliah.show');
    Route::patch('/mata-kuliah/edit/{id}', [MataKuliahController::class, 'update'])->name('mata-kuliah.update');
    Route::delete('/mata-kuliah/delete/{id}', [MataKuliahController::class, 'delete'])->name('mata-kuliah.delete');
    
    Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
});
