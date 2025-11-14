<x-guest-layout>
    <div class="min-h-screen w-full bg-cover bg-center relative flex justify-center items-center"
         style="background-image: url('{{ asset('images/ca.jpeg') }}');">

        <!-- Overlay putih transparan -->
        <div class="absolute inset-0 bg-white bg-opacity-40 backdrop-blur-sm"></div>

        <!-- FORM LOGIN -->
        <div class="relative z-10 w-full max-w-md bg-white bg-opacity-80 p-8 rounded-xl shadow-lg backdrop-blur-md">
            <div class="text-center mb-6">
                <h2 class="text-3xl font-semibold text-blue-700">Login System TabolaBale</h2>
                <p class="text-gray-600 text-sm">Masuk ke akun Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full"
                                  type="email" name="email"
                                  :value="old('email')" required autofocus autocomplete="username"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password" name="password"
                                  required autocomplete="current-password"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500"
                               name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-between mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline"
                           href="{{ route('password.request') }}">
                            {{ __('Lupa password?') }}
                        </a>
                    @endif

                    <x-primary-button class="ms-3 bg-blue-700 hover:bg-blue-800">
                        {{ __('Masuk') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-700">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline font-medium">
                    Daftar sekarang
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>