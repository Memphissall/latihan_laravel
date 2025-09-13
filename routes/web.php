<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mahasiswaController;

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

Route::get('/mahasiswa', [mahasiswaController::class, 'index']);
Route::post('/mahasiswa', [mahasiswaController::class, 'store']);