<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MasterAlamatSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('master_alamat')->insert([
            [
                'provinsi' => 'DKI Jakarta',
                'kota' => 'Jakarta Pusat',
                'kecamatan' => 'Menteng',
                'kode_pos' => '103010',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinsi' => 'Jawa Barat',
                'kota' => 'Bandung',
                'kecamatan' => 'Coblong',
                'kode_pos' => '40131',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinsi' => 'Jawa Tengah',
                'kota' => 'Semarang',
                'kecamatan' => 'Banyumanik',
                'kode_pos' => '50263',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinsi' => 'Jawa Timur',
                'kota' => 'Suarabaya',
                'kecamatan' => 'Tegalsari',
                'kode_pos' => '60262',
                'created _at' => now(),
                'updated_at' => now(),
            ],
            [
                'provinsi' => 'Bali',
                'kota' => 'Denpasar',
                'kecamatan' => 'Denpasar Selatan',
                'kode_pos' => '80228',
                'created_at' => now(),
                'updated_at' => now(),
            ],
   ]);
}
}
