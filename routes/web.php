<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\matkulController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return 'hello word dari tadi';
});

Route::get('/nama', function () {
    
    return 'nama saya adalah isal';
});

Route::get('/kelas', function () {
    return 'kelas saya adalah ase';
});

//mhs
Route::get('/mahasiswa', [mahasiswaController::class, 'index']);
Route::post('/mahasiswa', [mahasiswaController::class, 'store']);
//kls
Route::get('/kelas', [kelasController::class, 'index']);
Route::post('/kelas', [kelasController::class, 'store']);
//matkul
Route::get('/matkul', [matkulController::class, 'index']);
Route::post('/matkul', [matkulController::class, 'store']);