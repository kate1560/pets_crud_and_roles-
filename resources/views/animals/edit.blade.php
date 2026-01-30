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
                class="border-[#E5EDEB] text-[#6B7A7A] hover:bg-[#CFEDE0]"
            >
                Volver
            </x-button>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-card class="bg-[#FFFFFF]">
                <form method="POST" action="{{ route('animals.update', $animal) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    @include('animals.partials.form', [
                        'animal' => $animal,
                        'speciesOptions' => $speciesOptions
                    ])

                    <div class="pt-2 flex gap-2">
                        <x-button
                            type="submit"
                            class="bg-[#3B82F6] hover:bg-[#2563EB] text-white"
                        >
                            Actualizar
                        </x-button>

                        <x-button
                            variant="secondary"
                            href="{{ route('animals.index') }}"
                            class="border-[#E5EDEB] text-[#6B7A7A] hover:bg-[#FADADD]"
                        >
                            Cancelar
                        </x-button>
                    </div>
                </form>
            </x-card>

        </div>
    </div>
</x-app-layout>
