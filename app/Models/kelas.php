<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
     use HasFactory;
    //nama tabel
    protected $table = 'kelas';
    //kolom
    protected $fillable =[
        'kapasitas',
        'ruangan',
    ];
}
