<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    protected $table = 'clases';

    protected $fillable = [
        'nama_kelas'
    ];

    public function mahasiswa()
    {
        return $this->hasmany(Mahasiswa::class);
    }
}

