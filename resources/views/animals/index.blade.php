@extends('layouts.app')

@section('title', 'Catálogo de Animales')

@section('content')
    <x-card>
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-2xl font-semibold">Catálogo de Animales</h2>
                <p class="mt-2 text-sm text-slate-600">
                    Un registro claro y ordenado ayuda a cuidar mejor cada especie: seguimiento, contexto y decisiones responsables.
                </p>
            </div>

            <div class="sm:hidden">
                <x-button href="{{ route('animals.create') }}">+ Nuevo</x-button>
            </div>
        </div>
    </x-card>

    <x-card class="mt-5">
        <x-table>
            <x-slot:head>
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600">Nombre</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600">Especie</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600">Raza</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600">Edad</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-slate-600">Vacunado</th>
                    <th class="px-4 py-3 text-right text-xs font-semibold text-slate-600">Acciones</th>
                </tr>
            </x-slot:head>

            <x-slot:body>
                @forelse($animals as $animal)
                    <tr class="border-t border-beigeBrand/40">
                        <td class="px-4 py-3 text-sm font-medium">{{ $animal->name }}</td>
                        <td class="px-4 py-3 text-sm">
                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-pinkBrand/70 bg-pinkBrand/40">
                                {{ $animal->species }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-sm text-slate-700">{{ $animal->breed ?? '—' }}</td>
                        <td class="px-4 py-3 text-sm text-slate-700">{{ $animal->age ?? '—' }}</td>
                        <td class="px-4 py-3 text-sm">
                            @if($animal->is_vaccinated)
                                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-greenBrand/60 bg-greenBrand/20">
                                    Sí
                                </span>
                            @else
                                <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-medium border border-orangeBrand/60 bg-orangeBrand/15">
                                    No
                                </span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            <div class="flex justify-end gap-2">
                                <x-button variant="secondary" href="{{ route('animals.show', $animal) }}">Ver</x-button>
                                <x-button variant="secondary" href="{{ route('animals.edit', $animal) }}">Editar</x-button>

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
                        <td colspan="6" class="px-4 py-10 text-center text-sm text-slate-600">
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
@endsection
