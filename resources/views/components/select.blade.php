@props([
    'label' => null,
    'name' => null,
    'options' => [],
    'selected' => null,
    'required' => false,
])

@php
    $id = $attributes->get('id', $name);
    $current = old($name, $selected);
@endphp

<div class="space-y-1">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-[#6B7A7A]">
            {{ $label }}
        </label>
    @endif

    <select
        id="{{ $id }}"
        @if($name) name="{{ $name }}" @endif
        @if($required) required @endif
        {{ $attributes->merge([
            'class' => '
                w-full rounded-2xl
                border border-[#E5EDEB]
                bg-[#FFFFFF]
                px-3 py-2
                text-sm text-[#243434]
                outline-none
                focus:ring-2 focus:ring-[#3FAF7A]/40
                focus:border-[#3FAF7A]
            '
        ]) }}
    >
        <option value="">Selecciona una especie</option>

        @foreach($options as $key => $text)
            @php
                // Soporta ambas formas:
                // 1) ['Perro','Gato']  -> key=0, text='Perro' (value debe ser 'Perro')
                // 2) ['perro'=>'Perro'] -> key='perro', text='Perro' (value debe ser 'perro')
                $value = is_int($key) ? $text : $key;
                $labelText = $text;
            @endphp

            <option value="{{ $value }}" @selected((string)$current === (string)$value)>
                {{ $labelText }}
            </option>
        @endforeach
    </select>

    @error($name)
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
