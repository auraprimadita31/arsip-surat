<?php

use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

// Halaman utama (/) diarahkan ke SuratController dan diberi nama 'surat.index'
Route::get('/', [SuratController::class, 'index'])->name('surat.index');

// Route untuk semua fungsionalitas CRUD Kategori
Route::resource('kategori', KategoriController::class);

// Route untuk fungsionalitas CRUD Surat (kecuali 'index' karena sudah didefinisikan di atas)
Route::resource('surat', SuratController::class)->except(['index']);

// Route khusus untuk fungsionalitas download surat
Route::get('/surat/download/{surat}', [SuratController::class, 'download'])->name('surat.download');

// Route untuk halaman 'About'
Route::get('/about', function () {
    return view('about');
})->name('about');