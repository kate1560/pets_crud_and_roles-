@extends('layouts.app')

@section('title', 'Editar Animal')

@section('content')
    <x-card>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold">Editar animal</h2>
                <p class="mt-1 text-sm text-slate-600">Actualiza información sin perder el historial del registro.</p>
            </div>
            <x-button variant="secondary" href="{{ route('animals.index') }}">Volver</x-button>
        </div>
    </x-card>

    <x-card class="mt-5">
        <form method="POST" action="{{ route('animals.update', $animal) }}" class="space-y-4">
            @csrf
            @method('PUT')
            @include('animals.partials.form', ['animal' => $animal, 'speciesOptions' => $speciesOptions])

            <div class="pt-2 flex gap-2">
                <x-button type="submit">Actualizar</x-button>
                <x-button variant="secondary" href="{{ route('animals.index') }}">Cancelar</x-button>
            </div>
        </form>
    </x-card>
@endsection
