<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- kontem : title -->
    <title>LP3I – Kampus Vokasi Terbaik</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* Animasi lembut */
        .fade-up {
            animation: fadeUp 0.8s ease-in-out;
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0px); }
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- NAVBAR -->
    <header class="w-full py-4 bg-white/80 backdrop-blur-md shadow-md fixed top-0 left-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-4">
            <div class="flex items-center gap-3">
                <!-- Konten : logo  -->
                <img src="{{ asset('uploads/images/logo_blue.png') }}" class="w-24" />
                <h1 class="text-xl font-bold text-blue-700">LP3I</h1>
            </div>
                <!-- kontem : navbar -->
            <nav class="hidden md:flex gap-8 text-gray-700 font-semibold">
                <a href="#beranda" class="hover:text-blue-600 transition">Beranda</a>
                <a href="#program" class="hover:text-blue-600 transition">Program</a>
                <a href="#tentang" class="hover:text-blue-600 transition">Tentang</a>
                <a href="#kontak" class="hover:text-blue-600 transition">Kontak</a>
            </nav>

            <!-- Button -->
            <div class="flex gap-3">
                @guest
                    <a href="{{ route('login') }}" 
                       class="px-4 py-2 text-blue-600 font-semibold hover:text-blue-700 transition">
                       Login
                    </a>

                    <a href="{{ route('register') }}"
                       class="px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-lg font-medium hover:opacity-90 shadow-md transition">
                       Daftar
                    </a>
                @endguest

                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="px-4 py-2 text-blue-700 font-semibold">
                       Dashboard
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 shadow-md transition">
                            Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section id="beranda" class="pt-32 pb-20 bg-gradient-to-br from-blue-50 to-indigo-100 fade-up">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 px-4 items-center">

            <div>
                <h2 class="text-4xl md:text-5xl font-extrabold leading-tight text-gray-900 mb-6">
                    {{ $landing['text1'] ?? 'Kampus Vokasi Terbaik Untuk Masa Depan Karir Anda'}}
                </h2>
                <p class="text-lg text-gray-700 mb-8">
                    {!! $landing['hero_subtitle'] ?? 'Solusi Pendidikan Masa Depan' !!}

                </p>
                <div class="flex gap-5">
                    <a href="{{ route('register') }}"
                        class="px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white rounded-xl font-semibold text-lg hover:opacity-90 shadow-lg transition">
                        Daftar Sekarang
                    </a>

                    <a href="#program"
                       class="px-6 py-3 border border-blue-600 text-blue-700 rounded-xl font-semibold text-lg hover:bg-blue-100 transition">
                       Lihat Program
                    </a>
                </div>
            </div>
            <!-- image  -->
            <div class="flex justify-center">
                <img src="{{ asset('uploads/images/' . ($landing['hero_image'] ?? 'dosen.jpg')) }}" alt ="Mahasiswa LP3I" class="w-full max-w-2x1 object-cover object-cover rounded-x1 shadow-lg" />
            </div>

        </div>
    </section>

    <!-- PROGRAM -->
    <section id="program" class="py-20 bg-white fade-up">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h3 class="text-3xl font-bold text-gray-900 mb-12">Program Pendidikan</h3>

            <div class="grid md:grid-cols-3 gap-8">

                <div class="bg-gradient-to-b from-white to-blue-50 p-8 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-xl transition">
                    <h4 class="text-xl font-semibold mb-3 text-blue-700">Administrasi Bisnis</h4>
                    <p class="text-gray-600">Belajar pengelolaan bisnis dan administrasi modern dengan pendekatan vokasi.</p>
                </div>

                <div class="bg-gradient-to-b from-white to-indigo-50 p-8 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-xl transition">
                    <h4 class="text-xl font-semibold mb-3 text-indigo-700">Informatika & Komputer</h4>
                    <p class="text-gray-600">Siapkan kompetensi IT: pemrograman, jaringan, dan data.</p>
                </div>

                <div class="bg-gradient-to-b from-white to-purple-50 p-8 rounded-2xl shadow-lg hover:-translate-y-2 hover:shadow-xl transition">
                    <h4 class="text-xl font-semibold mb-3 text-purple-700">Digital Marketing</h4>
                    <p class="text-gray-600">Menguasai strategi pemasaran digital sesuai kebutuhan era industri.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- TENTANG -->
    <section id="tentang" class="py-20 bg-gray-50 fade-up">
        <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">

            <div>
                <h3 class="text-3xl font-bold text-gray-900 mb-6">Tentang LP3I</h3>

                <p class="text-gray-700 mb-4">
                    LP3I telah berdiri lebih dari 30 tahun sebagai kampus vokasi 
                    yang fokus pada dunia kerja nyata.
                </p>

                <p class="text-gray-700">
                    Dengan kurikulum industri, pembelajaran praktis, dan jaringan perusahaan luas, 
                    LP3I membantu mahasiswa siap kerja sejak awal.
                </p>
            </div>

            <div class="flex justify-center">
                <img src="{{ asset('/uploads/images/camp.jpeg') }}"
                     alt="Kampus LP3I"
                     class="w-full max-w-md rounded-2xl shadow-xl object-cover" />
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer id="kontak" class="bg-gradient-to-br from-blue-700 to-blue-900 text-white py-12 fade-up">
        <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-10">

            <div>
                <h3 class="text-xl font-semibold mb-3">LP3I</h3>
                <p class="text-blue-100">Kampus vokasi modern untuk masa depan karier Anda.</p>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-3">Navigasi</h3>
                <ul class="space-y-2 text-blue-100">
                    <li><a href="#beranda" class="hover:underline">Beranda</a></li>
                    <li><a href="#program" class="hover:underline">Program</a></li>
                    <li><a href="#tentang" class="hover:underline">Tentang</a></li>
                    <li><a href="#kontak" class="hover:underline">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h3 class="text-xl font-semibold mb-3">Hubungi Kami</h3>
                <p>Email: info@lp3i.id</p>
                <p>Telp: (021) 12345678</p>
            </div>

        </div>

        <div class="text-center text-blue-200 mt-10 text-sm">
            © 2025 LP3I. Semua Hak Dilindungi.
        </div>
    </footer>

</body>
</html>
