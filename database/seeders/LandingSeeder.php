<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LandingSetting;
use App\Models\LandingNavLink;
use App\Models\LandingProgram;
use App\Models\LandingFooterLink;

class LandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /** ================================
         *  LANDING SETTINGS (Hero Section)
         *  ================================ */
        $settings = [
            ['Kampus Vokasi Terbaik Untuk Masa Depan Karier Anda.', 'text1', 'text'],
            ['Kurikulum berbasis industri dengan fokus pendidikan vokasi yang relevan dengan dunia kerja. Raih keterampilan praktis dan peluang karier lebih cepat bersama kami.', 'text2', 'text'],
            ['hero_landing', 'hero-bg-1920x851.jpg', 'image'],
        ];

        foreach ($settings as $item) {
            LandingSetting::updateOrCreate(
                ['key' => $item[1]],
                ['value' => $item[0], 'type' => $item[2], 'status' => 1]
            );
        }

        /** ================================
         *  NAVIGATION MENU
         *  ================================ */
        $navLinks = [
            ['Beranda', '#beranda', 1],
            ['Program', '#program', 2],
            ['Tentang', '#tentang', 3],
            ['Kontak', '#kontak', 4],
        ];

        foreach ($navLinks as $item) {
            LandingNavLink::updateOrCreate(
                ['label' => $item[0]],
                ['url' => $item[1], 'position' => $item[2], 'status' => 1]
            );
        }

        /** ================================
         *  PROGRAM PENDIDIKAN SECTION
         *  ================================ */
        $programs = [
            ['Administrasi Bisnis', 'Belajar pengelolaan bisnis, administrasi perkantoran, dan dunia manajemen modern.', null, 1],
            ['Informatika & Komputer', 'Program vokasi untuk dunia IT: pemrograman, jaringan, dan data.', null, 2],
            ['Digital Marketing', 'Menguasai strategi pemasaran digital sesuai kebutuhan industri.', null, 3],
        ];

        foreach ($programs as $item) {
            LandingProgram::updateOrCreate(
                ['title' => $item[0]],
                [
                    'description' => $item[1],
                    'image' => $item[2],
                    'position' => $item[3],
                    'status' => 1
                ]
            );
        }

        /** ================================
         *  FOOTER LINKS
         *  ================================ */
        $footerLinks = [
            ['Beranda', '#beranda', 1],
            ['Program', '#program', 2],
            ['Tentang', '#tentang', 3],
            ['Kontak', '#kontak', 4],
            ['Email: info@lp3i.ac.id', 'mailto:info@lp3i.ac.id', 5],
            ['Telp: (021) 12345678', 'tel:+622112345678', 6],
        ];

        foreach ($footerLinks as $item) {
            LandingFooterLink::updateOrCreate(
                ['label' => $item[0]],
                ['url' => $item[1], 'position' => $item[2], 'status' => 1]
            );
        }
    }
}
