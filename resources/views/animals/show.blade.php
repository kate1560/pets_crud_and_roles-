<x-app-layout>
    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold text-[#243434] leading-tight">
                    {{ $animal->name }}
                </h2>
                <p class="mt-1 text-sm text-[#6B7A7A]">
                    Información detallada para un registro más completo y útil.
                </p>
            </div>

            <div class="flex gap-2">
                <x-button
                    href="{{ route('animals.edit', $animal) }}"
                    class="bg-VetBlue hover:opacity-90 text-white"
                >
                    Editar
                </x-button>

                {{-- BOTÓN VOLVER estilo beige --}}
                <x-button
                    href="{{ route('animals.index') }}"
                    class="bg-VetCream border border-BorderSoft text-[#243434] hover:opacity-90"
                >
                    Volver
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- FOTO + RESUMEN --}}
            <x-card class="bg-[#FFFFFF] border border-BorderSoft">
                <div class="flex flex-col sm:flex-row sm:items-center gap-6">

                    {{-- FOTO --}}
                    @if(!empty($animal->image_path))
                        <img
                            src="{{ asset('storage/'.$animal->image_path) }}"
                            alt="Foto {{ $animal->name }}"
                            class="h-36 w-36 rounded-3xl object-cover border border-BorderSoft"
                        >
                    @else
                        <div class="h-36 w-36 rounded-3xl border border-BorderSoft bg-[#FFF7EC] flex items-center justify-center text-sm text-[#6B7A7A]">
                            Sin foto
                        </div>
                    @endif

                    <div class="flex-1">
                        <div class="flex flex-wrap items-center gap-2">

                            {{-- Especie --}}
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs bg-VetSand text-[#243434]">
                                {{ $animal->species }}
                            </span>

                            {{-- Vacunado --}}
                            @if($animal->is_vaccinated)
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs bg-VetGreenSoft text-[#243434]">
                                    Vacunado: Sí
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs bg-VetRose text-[#243434]">
                                    Vacunado: No
                                </span>
                            @endif

                            {{-- Dueño (solo admin) --}}
                            @if(auth()->user()->role === 'admin')
                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs border border-BorderSoft bg-[#FFFFFF] text-[#243434]">
                                    Dueño: {{ $animal->owner?->name ?? '—' }}
                                </span>
                            @endif

                        </div>

                        <p class="mt-3 text-sm text-[#6B7A7A]">
                            Revisa y gestiona la información del animal en un solo lugar.
                        </p>
                    </div>
                </div>
            </x-card>

            {{-- DETALLES --}}
            <x-card class="bg-[#FFFFFF] border border-BorderSoft mt-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-[#243434]">

                    <div>
                        <span class="text-[#6B7A7A]">Raza:</span>
                        <span class="font-medium">{{ $animal->breed ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="text-[#6B7A7A]">Edad:</span>
                        <span class="font-medium">{{ $animal->age ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="text-[#6B7A7A]">Peso:</span>
                        <span class="font-medium">{{ $animal->weight ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="text-[#6B7A7A]">Color:</span>
                        <span class="font-medium">{{ $animal->color ?? '—' }}</span>
                    </div>

                    <div class="sm:col-span-2">
                        <span class="text-[#6B7A7A]">Notas:</span>
                        <div class="mt-2 rounded-2xl border border-BorderSoft bg-[#FFF7EC] p-3">
                            {{ $animal->notes ?? '—' }}
                        </div>
                    </div>

                </div>
            </x-card>

        </div>
    </div>
</x-app-layout>
