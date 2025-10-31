<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/mata-kuliah', [MataKuliahController::class, 'index'])->name('mata-kuliah.index');
Route::get('/mata-kuliah/create', [MataKuliahController::class, 'create'])->name('mata-kuliah.create');
Route::post('/mata-kuliah/store', [MataKuliahController::class, 'store'])->name('mata-kuliah.store');
Route::get('/mata-kuliah/edit/{id}', [MataKuliahController::class, 'show'])->name('mata-kuliah.show');
Route::patch('/mata-kuliah/edit/{id}', [MataKuliahController::class, 'update'])->name('mata-kuliah.update');
Route::delete('/mata-kuliah/delete/{id}', [MataKuliahController::class, 'delete'])->name('mata-kuliah.delete');

Route::get('/absensi', [AbsensiController::class, 'index'])->name('absensi.index');
Route::post('/absensi', [AbsensiController::class, 'store'])->name('absensi.store');
// Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
// Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
// Route::get('/absensi/edit/{id}', [AbsensiController::class, 'show'])->name('absensi.show');
// Route::patch('/absensi/edit/{id}', [AbsensiController::class, 'update'])->name('absensi.update');
// Route::delete('/absensi/delete/{id}', [AbsensiController::class, 'delete'])->name('absensi.delete');
