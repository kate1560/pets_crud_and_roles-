@props([
    'label' => null,
    'options' => [],
    'selected' => null,
])

<div class="space-y-1">
    @if($label)
        <label class="block text-sm font-medium text-[#6B7A7A]">
            {{ $label }}
        </label>
    @endif

    <select
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

        @foreach($options as $value => $text)
            <option value="{{ $value }}" @selected($value == $selected)>
                {{ $text }}
            </option>
        @endforeach
    </select>
</div>
