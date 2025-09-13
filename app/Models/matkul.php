<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matkul extends Model
{
    use HasFactory;
    //nama tabel
    protected $table ='matkul';

    //kolom
    protected $fillable = [
        'namamatkul',
        'deks',
    ];
}
