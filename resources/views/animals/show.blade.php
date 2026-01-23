@extends('layouts.app')

@section('title', 'Detalle Animal')

@section('content')
    <x-card>
        <div class="flex items-start justify-between gap-4">
            <div>
                <h2 class="text-2xl font-semibold">{{ $animal->name }}</h2>
                <p class="mt-2 text-sm text-slate-600">
                    Información detallada para un registro más completo y útil.
                </p>
            </div>
            <div class="flex gap-2">
                <x-button variant="secondary" href="{{ route('animals.edit', $animal) }}">Editar</x-button>
                <x-button variant="secondary" href="{{ route('animals.index') }}">Volver</x-button>
            </div>
        </div>
    </x-card>

    <x-card class="mt-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
            <div><span class="text-slate-500">Especie:</span> <span class="font-medium">{{ $animal->species }}</span></div>
            <div><span class="text-slate-500">Raza:</span> <span class="font-medium">{{ $animal->breed ?? '—' }}</span></div>
            <div><span class="text-slate-500">Edad:</span> <span class="font-medium">{{ $animal->age ?? '—' }}</span></div>
            <div><span class="text-slate-500">Peso:</span> <span class="font-medium">{{ $animal->weight ?? '—' }}</span></div>
            <div><span class="text-slate-500">Color:</span> <span class="font-medium">{{ $animal->color ?? '—' }}</span></div>
            <div>
                <span class="text-slate-500">Vacunado:</span>
                <span class="font-medium">{{ $animal->is_vaccinated ? 'Sí' : 'No' }}</span>
            </div>
            <div class="sm:col-span-2">
                <span class="text-slate-500">Notas:</span>
                <div class="mt-1 rounded-2xl border border-beigeBrand/50 bg-white/60 p-3">
                    {{ $animal->notes ?? '—' }}
                </div>
            </div>
        </div>
    </x-card>
@endsection
