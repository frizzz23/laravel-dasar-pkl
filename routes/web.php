<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\ResepController;

Route::get('/', function () {
    return view('auth.login');
});


// Route Resep Start

Route::get('/resep', function () {
    return view('resep');
})->middleware(['auth', 'verified'])->name('resep');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/resep', [ResepController::class, 'index'])->name('resep');
    Route::get('/resep/tambah', [ResepController::class, 'create'])->name('resep.tambah');;
    Route::post('/resep', [ResepController::class, 'store'])->name('resep.store');
    Route::get('/resep/lihat/{id}', [ResepController::class, 'show'])->name('resep.lihat');
    Route::get('/resep/edit/{id}', [ResepController::class, 'edit'])->name('resep.edit');
    Route::put('/resep/update/{id}', [ResepController::class, 'update'])->name('resep.update');
    Route::delete('/resep{id}', [ResepController::class, 'destroy'])->name('resep.destroy');

});

// Route Resep end

// Route Kunjungan strat

Route::get('/kunjungan', function () {
    return view('kunjungan');
})->middleware(['auth', 'verified'])->name('kunjungan');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/kunjungan', [KunjunganController::class, 'index'])->name('kunjungan');
    Route::get('/kunjungan/tambah', [KunjunganController::class, 'create'])->name('kunjungan.tambah');;
    Route::post('/kunjungan', [KunjunganController::class, 'store'])->name('kunjungan.store');
    Route::get('/kunjungan/lihat/{id}', [KunjunganController::class, 'show'])->name('kunjungan.lihat');
    Route::get('/kunjungan/edit/{id}', [KunjunganController::class, 'edit'])->name('kunjungan.edit');
    Route::put('/kunjungan/update/{id}', [KunjunganController::class, 'update'])->name('kunjungan.update');
    Route::delete('/kunjungan{id}', [KunjunganController::class, 'destroy'])->name('kunjungan.destroy');

});

// RouteKunjungan End

// Route obat Start

Route::get('/obat', function () {
    return view('obat');
})->middleware(['auth', 'verified'])->name('obat');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/obat/tambah', [ObatController::class, 'create'])->name('obat.tambah');;
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::get('/obat/lihat/{id}', [ObatController::class, 'show'])->name('obat.lihat');
    Route::get('/obat/edit/{id}', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/update/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat{id}', [ObatController::class, 'destroy'])->name('obat.destroy');

});

// Route Obat End


 // Route dokter Start   
Route::get('/dokter', function () {
    return view('dokter');
})->middleware(['auth', 'verified'])->name('dokter');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter');
    Route::get('/dokter/tambah', [DokterController::class, 'create'])->name('dokter.tambah');;
    Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
    Route::get('/dokter/lihat/{id}', [DokterController::class, 'show'])->name('dokter.lihat');
    Route::get('/dokter/edit/{id}', [DokterController::class, 'edit'])->name('dokter.edit');
    Route::put('/dokter/update/{id}', [DokterController::class, 'update'])->name('dokter.update');
    Route::delete('/dokter{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

});

// Route dokter End

// Route pasien Start

Route::get('/pasien', function () {
    return view('pasien');
})->middleware(['auth', 'verified'])->name('pasien');
    
Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
    Route::get('/pasien/tambah', [PasienController::class, 'create'])->name('pasien.tambah');;
    Route::post('/pasien', [PasienController::class, 'store'])->name('pasien.store');
    Route::get('/pasien/lihat/{id}', [PasienController::class, 'show'])->name('pasien.lihat');
    Route::get('/pasien/edit/{id}', [PasienController::class, 'edit'])->name('pasien.edit');
    Route::put('/pasien/update/{id}', [PasienController::class, 'update'])->name('pasien.update');
    Route::delete('/pasien{id}', [PasienController::class, 'destroy'])->name('pasien.destroy');

});

// Route pasien End


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
