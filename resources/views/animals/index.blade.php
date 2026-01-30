<x-app-layout>
    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-800 leading-tight">
                    Catálogo de Animales
                </h2>
                <p class="mt-1 text-sm text-gray-500">
                    Un registro claro y ordenado ayuda a cuidar mejor cada especie: seguimiento, contexto y decisiones responsables.
                </p>
            </div>

            <div class="hidden sm:block">
                <x-button
                    href="{{ route('animals.create') }}"
                    class="bg-[#3FAF7A] hover:bg-[#2E8B62] text-white"
                >
                    + Nuevo
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-card class="bg-white">
                <x-table>
                    <x-slot:head>
                        <tr class="bg-[#CFEDE0]/70">
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#243434]">Nombre</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#243434]">Especie</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#243434]">Raza</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#243434]">Edad</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-[#243434]">Vacunado</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold text-[#243434]">Acciones</th>
                        </tr>
                    </x-slot:head>

                    <x-slot:body>
                        @forelse($animals as $animal)
                            <tr class="border-t border-[#E5EDEB] hover:bg-[#FFF7EC]">
                                <td class="px-4 py-3 text-sm font-medium text-[#243434]">{{ $animal->name }}</td>

                                <td class="px-4 py-3 text-sm">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-[#F3E6D6] bg-[#F3E6D6] text-[#243434]">
                                        {{ $animal->species }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-sm text-[#6B7A7A]">{{ $animal->breed ?? '—' }}</td>
                                <td class="px-4 py-3 text-sm text-[#6B7A7A]">{{ $animal->age ?? '—' }}</td>

                                <td class="px-4 py-3 text-sm">
                                    @if($animal->is_vaccinated)
                                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-[#CFEDE0] bg-[#CFEDE0] text-[#243434]">
                                            Sí
                                        </span>
                                    @else
                                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-[#FADADD] bg-[#FADADD] text-[#243434]">
                                            No
                                        </span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-sm">
                                    <div class="flex justify-end gap-2">
                                        <x-button
                                            variant="secondary"
                                            href="{{ route('animals.show', $animal) }}"
                                            class="border-[#E5EDEB] text-[#3B82F6] hover:bg-[#E6F0FF]"
                                        >
                                            Ver
                                        </x-button>

                                        <x-button
                                            variant="secondary"
                                            href="{{ route('animals.edit', $animal) }}"
                                            class="border-[#E5EDEB] text-[#3B82F6] hover:bg-[#E6F0FF]"
                                        >
                                            Editar
                                        </x-button>

                                        <x-modal-confirm
                                            title="Eliminar animal"
                                            message="¿Seguro que deseas eliminar a '{{ $animal->name }}'? Esta acción no se puede deshacer."
                                            action="{{ route('animals.destroy', $animal) }}"
                                        />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-10 text-center text-sm text-[#6B7A7A]">
                                    No hay animales registrados aún. Crea el primero.
                                </td>
                            </tr>
                        @endforelse
                    </x-slot:body>
                </x-table>

                <div class="mt-4">
                    <x-pagination :paginator="$animals" />
                </div>
            </x-card>

        </div>
    </div>
</x-app-layout>
