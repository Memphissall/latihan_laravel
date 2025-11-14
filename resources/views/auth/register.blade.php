<x-guest-layout>
    <div class="min-h-screen w-full bg-cover bg-center relative flex justify-center items-center"
         style="background-image: url('{{ asset('images/dosen.jpg') }}');">

        <!-- Overlay putih -->
        <div class="absolute inset-0 bg-white bg-opacity-40 backdrop-blur-sm"></div>

        <!-- CARD REGISTER -->
        <div class="relative z-10 w-full max-w-md bg-white bg-opacity-80 p-8 rounded-xl shadow-lg backdrop-blur-md">

            <div class="text-center mb-6">
                <h2 class="text-3xl font-semibold text-blue-700">Register System TabolaBale</h2>
                <p class="text-gray-600 text-sm">Buat akun baru</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" class="block mt-1 w-full"
                                  type="text" name="name"
                                  :value="old('name')" required autofocus autocomplete="name"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email" name="email"
                                  :value="old('email')" required autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"  name="password"
                                  required autocomplete="new-password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                  type="password" name="password_confirmation"
                                  required autocomplete="new-password"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Button -->
                <div class="flex justify-end mt-6">
                    <x-primary-button class="bg-blue-700 hover:bg-blue-800">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-700">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium">
                    Masuk sekarang
                </a>
            </div>

        </div>
    </div>
</x-guest-layout>
