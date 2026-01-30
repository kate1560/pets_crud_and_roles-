<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#FFF7EC] px-4">

        <x-authentication-card class="bg-white rounded-3xl shadow-sm w-full max-w-md">

            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>

            <x-validation-errors class="mb-4 text-sm text-red-600" />

            @session('status')
                <div class="mb-4 text-sm font-medium text-[#3FAF7A]">
                    {{ $value }}
                </div>
            @endsession

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-label
                        for="email"
                        value="Correo electrónico"
                        class="text-[#6B7A7A]"
                    />

                    <x-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username"
                        class="block w-full"
                    />
                </div>

                <!-- Password -->
                <div>
                    <x-label
                        for="password"
                        value="Contraseña"
                        class="text-[#6B7A7A]"
                    />

                    <x-input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        class="block w-full"
                    />
                </div>

                <!-- Remember -->
                <div class="flex items-center">
                    <x-checkbox
                        id="remember_me"
                        name="remember"
                        class="text-[#3FAF7A] focus:ring-[#3FAF7A]"
                    />

                    <label for="remember_me" class="ml-2 text-sm text-[#6B7A7A]">
                        Recordarme
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-between pt-2">
                    @if (Route::has('password.request'))
                        <a
                            href="{{ route('password.request') }}"
                            class="text-sm text-[#6B7A7A] hover:text-[#243434] underline"
                        >
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <x-button
                        type="submit"
                        class="bg-[#3FAF7A] hover:bg-[#2E8B62] text-white"
                    >
                        Iniciar sesión
                    </x-button>
                </div>
            </form>

        </x-authentication-card>
    </div>
</x-guest-layout>
