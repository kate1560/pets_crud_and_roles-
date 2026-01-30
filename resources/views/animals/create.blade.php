<x-app-layout> 
    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                    Crear animal
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Completa los datos básicos para registrar una nueva especie.
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
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-card class="bg-white">

                {{-- 🔴 ERRORES DE VALIDACIÓN --}}
                @if ($errors->any())
                    <div class="mb-4 rounded-2xl border border-[#FADADD] bg-[#FFF7EC] p-3 text-sm text-[#243434]">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('animals.store') }}" class="space-y-4">
                    @csrf

                    @include('animals.partials.form', [
                        'animal' => null,
                        'speciesOptions' => $speciesOptions,
                    ])

                    <div class="pt-2 flex gap-2">
                        <x-button
                            type="submit"
                            class="bg-[#3FAF7A] hover:bg-[#2E8B62] text-white"
                        >
                            Guardar
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
