<?php

namespace Database\Seeders;
use App\Models\Clases;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Clases::create(['nama_kelas' => 'Kelas A']);
        Clases::create(['nama_kelas' => 'Kelas B']);
        Clases::create(['nama_kelas' => 'Kelas C']);
       
    }
}
