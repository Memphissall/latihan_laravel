<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterAlamat extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'master_alamat';

    // Kolom yang boleh diisi mass assignment (fillable)
    protected $fillable = ['provinsi', 'kota', 'kecamatan', 'kode_pos'];
}
