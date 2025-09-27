<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    use HasFactory;

    // Nama Tabel
    protected $table = 'dosen';

    // Kolom yang bisa di isi mass-assignment
    protected $fillable = [
        'nama',
        'nid',
        'jenis_kelamin',
    ];
}
