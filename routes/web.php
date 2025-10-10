<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\mahasiswacontroller;
use App\Http\Controllers\kelascontroller;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\Auth\StudentRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EkycController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

//mahasiswa
    Route::get('/mahasiswa', [mahasiswacontroller::class, 'index'])->name('mahasiswa.index');
    Route::post('/mahasiswa', [mahasiswacontroller::class, 'store'])->name('mahasiswa.store');
    Route::get('/mahasiswa/{id}/edit', [mahasiswacontroller::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [mahasiswacontroller::class, 'update'])->name('mahasiswa.update');
    Route::delete('/mahasiswa/{id}', [mahasiswacontroller::class, 'destroy'])->name('mahasiswa.destroy');
   
    Route::get('/kelas', [kelascontroller::class, 'index'])->name('kelas.index');
    Route::post('/kelas', [kelascontroller::class, 'store'])->name('kelas.store');

    Route::get('/dosen', [dosencontroller::class, 'index'])->name('dosen.index');
    Route::post('/dosen', [dosencontroller::class, 'store'])->name('dosen.store');

    Route::get('/register-mahasiswa',[StudentRegisterController::class,'showRegistrationForm']) ->name('register.mahasiswa');
    Route::post('/register-mahasiswa',[StudentRegisterController::class,'register']);

    Route::middleware(['auth'])->prefix('ekyc')->group(function () {
    Route::get('step1', [EkycController::class, 'step1'])->name('ekyc.step1');
    Route::post('step1', [EkycController::class, 'storeStep1'])->name('ekyc.storeStep1');

    // sementara step2
    Route::get('step2', function () {
        return "Step 2: Upload Dokumen (belum dibuat)";
    })->name('ekyc.step2');
});

   
});

require __DIR__.'/auth.php';
