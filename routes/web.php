<?php

use Illuminate\Support\Facades\Route;

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