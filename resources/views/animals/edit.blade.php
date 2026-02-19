<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold text-[#243434] leading-tight">
                    Editar animal
                </h2>
                <p class="mt-1 text-sm text-[#6B7A7A]">
                    Actualiza información sin perder el historial del registro.
                </p>
            </div>

            <x-button
                variant="secondary"
                href="{{ route('animals.index') }}"
                class="border-BorderSoft text-[#6B7A7A] hover:bg-VetGreenSoft"
            >
                Volver
            </x-button>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-card class="bg-[#FFFFFF] border border-BorderSoft">

                {{-- ERRORES --}}
                @if ($errors->any())
                    <div class="mb-4 rounded-2xl border border-[#FADADD] bg-[#FFF7EC] p-3 text-sm text-[#243434]">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST"
                      action="{{ route('animals.update', $animal) }}"
                      enctype="multipart/form-data"
                      class="space-y-4">
                    @csrf
                    @method('PUT')

                    @include('animals.partials.form', [
                        'animal' => $animal,
                        'speciesOptions' => $speciesOptions
                    ])

                    {{-- IMAGEN ACTUAL --}}
                    @if($animal->image_path)
                        <div class="mt-4">
                            <label class="block text-sm text-[#6B7A7A]">Imagen actual</label>
                            <img
                                class="mt-2 h-28 w-28 rounded-3xl object-cover border border-BorderSoft"
                                src="{{ asset('storage/'.$animal->image_path) }}"
                                alt="Foto {{ $animal->name }}"
                            >
                        </div>
                    @endif

                    {{-- CAMBIAR IMAGEN --}}
                    <div class="mt-4">
                        <label class="block text-sm text-[#6B7A7A]">Cambiar imagen (opcional)</label>
                        <input
                            type="file"
                            name="image"
                            class="mt-1 w-full rounded-2xl border border-BorderSoft bg-[#FFFFFF] px-3 py-2 text-sm text-[#243434]"
                        >
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="pt-2 flex gap-2">
                        <x-button
                            type="submit"
                            class="bg-VetBlue hover:opacity-90 text-white"
                        >
                            Actualizar
                        </x-button>

                        <x-button
                            variant="secondary"
                            href="{{ route('animals.index') }}"
                            class="border-BorderSoft text-[#6B7A7A] hover:bg-VetRose"
                        >
                            Cancelar
                        </x-button>
                    </div>
                </form>
            </x-card>

        </div>
    </div>
</x-app-layout>
