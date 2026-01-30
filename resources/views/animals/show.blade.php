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
                    variant="secondary"
                    href="{{ route('animals.edit', $animal) }}"
                >
                    Editar
                </x-button>

                <x-button
                    variant="secondary"
                    href="{{ route('animals.index') }}"
                >
                    Volver
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-card class="bg-[#FFFFFF]">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-[#243434]">
                    <div>
                        <span class="text-[#6B7A7A]">Especie:</span>
                        <span class="font-medium">{{ $animal->species }}</span>
                    </div>

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

                    <div>
                        <span class="text-[#6B7A7A]">Vacunado:</span>
                        @if($animal->is_vaccinated)
                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-[#CFEDE0] bg-[#CFEDE0] text-[#243434]">
                                Sí
                            </span>
                        @else
                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-[#FADADD] bg-[#FADADD] text-[#243434]">
                                No
                            </span>
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <span class="text-[#6B7A7A]">Notas:</span>
                        <div class="mt-1 rounded-2xl border border-[#E5EDEB] bg-[#FFF7EC] p-3">
                            {{ $animal->notes ?? '—' }}
                        </div>
                    </div>
                </div>
            </x-card>

        </div>
    </div>
</x-app-layout>
