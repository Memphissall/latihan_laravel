<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;
    //Nama Tabel
    protected $table ='mahasiswa';

    //kolom yang bisa di isi mass-assigment
    protected $fillable = [
        'nama',
        'nim',
    ];
}
