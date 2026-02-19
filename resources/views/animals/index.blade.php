<x-app-layout>
    <x-slot name="header">
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-2xl font-semibold text-[#243434]">Catálogo de Animales</h2>
                <p class="mt-2 text-sm text-[#6B7A7A]">
                    Un registro claro y ordenado ayuda a cuidar mejor cada especie: seguimiento, contexto y decisiones responsables.
                </p>
            </div>

            <div class="sm:hidden">
                <x-button
                    href="{{ route('animals.create') }}"
                    class="bg-VetGreen hover:opacity-90 text-white"
                >
                    + Nuevo
                </x-button>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <x-card class="bg-[#FFFFFF] border border-BorderSoft">
                <div class="hidden sm:flex justify-end">
                    <x-button
                        href="{{ route('animals.create') }}"
                        class="bg-VetGreen hover:opacity-90 text-white"
                    >
                        + Nuevo
                    </x-button>
                </div>

                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full rounded-2xl overflow-hidden">
                        <thead class="bg-VetGreenSoft">
                            <tr>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Foto</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Nombre</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Especie</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Raza</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Edad</th>
                                <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Vacunado</th>

                                @if(auth()->user()->role === 'admin')
                                    <th class="px-4 py-3 text-left text-sm font-semibold text-[#243434]">Dueño</th>
                                @endif

                                <th class="px-4 py-3 text-right text-sm font-semibold text-[#243434]">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="bg-[#FFFFFF]">
                            @forelse($animals as $animal)
                                <tr class="border-t border-BorderSoft">
                                    <td class="px-4 py-3">
                                        @if(!empty($animal->image_path))
                                            <img
                                                class="h-12 w-12 rounded-2xl object-cover border border-BorderSoft"
                                                src="{{ asset('storage/'.$animal->image_path) }}"
                                                alt="Foto {{ $animal->name }}"
                                            >
                                        @else
                                            <div class="h-12 w-12 rounded-2xl border border-BorderSoft bg-[#FFF7EC] flex items-center justify-center text-xs text-[#6B7A7A]">
                                                —
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-[#243434] font-medium">
                                        {{ $animal->name }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-VetSand text-[#243434]">
                                            {{ $animal->species }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3 text-[#243434]">
                                        {{ $animal->breed ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3 text-[#243434]">
                                        {{ $animal->age ?? '—' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        @if($animal->is_vaccinated)
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-VetGreenSoft text-[#243434]">
                                                Sí
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs bg-VetRose text-[#243434]">
                                                No
                                            </span>
                                        @endif
                                    </td>

                                    @if(auth()->user()->role === 'admin')
                                        <td class="px-4 py-3 text-[#243434]">
                                            {{ $animal->owner?->name ?? '—' }}
                                        </td>
                                    @endif

                                    <td class="px-4 py-3">
                                        <div class="flex justify-end gap-2">
                                            {{-- ✅ VER --}}
                                            <x-button
                                                href="{{ route('animals.show', $animal) }}"
                                                class="bg-VetSand hover:opacity-90 text-[#243434]"
                                            >
                                                Ver
                                            </x-button>

                                            {{-- ✅ EDITAR --}}
                                            <x-button
                                                href="{{ route('animals.edit', $animal) }}"
                                                class="bg-VetBlue hover:opacity-90 text-white"
                                            >
                                                Editar
                                            </x-button>

                                            {{-- ✅ ELIMINAR --}}
                                            <form method="POST" action="{{ route('animals.destroy', $animal) }}">
                                                @csrf
                                                @method('DELETE')
                                                <x-button
                                                    type="submit"
                                                    class="bg-VetRedSoft hover:opacity-90 text-[#243434]"
                                                    onclick="return confirm('¿Seguro que deseas eliminar este animal?')"
                                                >
                                                    Eliminar
                                                </x-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td
                                        class="px-4 py-6 text-sm text-[#6B7A7A]"
                                        colspan="{{ auth()->user()->role === 'admin' ? 8 : 7 }}"
                                    >
                                        No hay animales registrados todavía.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $animals->links() }}
                </div>
            </x-card>

        </div>
    </div>
</x-app-layout>
