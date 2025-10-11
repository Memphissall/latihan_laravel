<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="min-h-screen">
            {{-- ====== HEADER / NVBAR ATAS ====== --}}
            @include('layouts.navigation')
            {{-- ====== navigation.blade.php bawaan breeze/jestrem --}}

            {{-- ====== BODY: Sidebar + Konten ====== --}}
            <div class="flex">
                <aside class="w-64 bg-white border-r shadow-sm min-h-screen">
                    <nav class="p-4 space-y-1">
                        @if (Auth::user() && Auth::user()->role === 'admin')
                        <a href="{{ route('dashboard') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('dashboard') ? 'bg-gray-200 font-semibold' : ''}}">
                        dashboard
</a>
           
                        <a href="{{ route('mahasiswa.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('mahasiswa') ? 'bg-gray-200 font-semibold' : ''}}">
                        Mahasiswa
</a>
           
                        <a href="{{ route('kelas.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('kelas.index') ? 'bg-gray-200 font-semibold' : ''}}">
                        Ruangan
</a>
                        <a href="{{ route('dosen.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-200 {{ request()->routeIs('dosen.index') ? 'bg-gray-200 font-semibold' : ''}}">
                        Dosen
</a>
@endif
</nav>
</aside>

<main class="flex-1 p-6">
    {{ $slot ?? '' }}
    @yield('content')
</main>

</div>
        </div>
    </body>
</html>
