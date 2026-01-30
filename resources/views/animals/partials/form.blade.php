@php
  $isEdit = !is_null($animal);
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <x-input
        label="Nombre *"
        name="name"
        value="{{ old('name', $animal->name ?? '') }}"
        placeholder="Ej: Luna, Max..."
        required
    />

    <x-select
        label="Especie *"
        name="species"
        :options="$speciesOptions"
        selected="{{ old('species', $animal->species ?? '') }}"
        required
    />

    <x-input
        label="Raza"
        name="breed"
        value="{{ old('breed', $animal->breed ?? '') }}"
        placeholder="Ej: Labrador..."
    />

    <x-input
        label="Edad"
        name="age"
        type="number"
        value="{{ old('age', $animal->age ?? '') }}"
        placeholder="0 - 100"
        min="0"
        max="100"
    />

    <x-input
        label="Peso"
        name="weight"
        type="number"
        step="0.01"
        value="{{ old('weight', $animal->weight ?? '') }}"
        placeholder="Ej: 8.50"
        min="0"
    />

    <x-input
        label="Color"
        name="color"
        value="{{ old('color', $animal->color ?? '') }}"
        placeholder="Ej: Blanco, Marrón..."
    />
</div>

<div class="flex items-center gap-2">
    <input
        id="is_vaccinated"
        name="is_vaccinated"
        type="checkbox"
        value="1"
        class="h-4 w-4 rounded border-[#E5EDEB] text-[#3FAF7A] focus:ring-[#3FAF7A]/50"
        @checked(old('is_vaccinated', $animal->is_vaccinated ?? false))
    >
    <label for="is_vaccinated" class="text-sm text-[#6B7A7A]">Vacunado</label>
</div>

<div>
    <label class="block text-sm font-medium text-[#6B7A7A] mb-1">Notas</label>
    <textarea
        name="notes"
        rows="4"
        class="w-full rounded-2xl border border-[#E5EDEB] bg-[#FFFFFF] px-3 py-2 text-sm text-[#243434] outline-none focus:ring-2 focus:ring-[#3FAF7A]/40 focus:border-[#3FAF7A]/70"
        placeholder="Observaciones relevantes..."
    >{{ old('notes', $animal->notes ?? '') }}</textarea>
</div>
