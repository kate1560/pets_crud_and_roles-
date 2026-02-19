@props([
    'label' => null,
    'name' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false,
])

@php
    $id = $attributes->get('id', $name);
@endphp

<div class="space-y-1">
    @if($label)
        <label for="{{ $id }}" class="block text-sm font-medium text-[#6B7A7A]">
            {{ $label }}
        </label>
    @endif

    <input
        id="{{ $id }}"
        @if($name) name="{{ $name }}" @endif
        type="{{ $type }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        @if($required) required @endif
        @if($disabled) disabled @endif
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
                disabled:opacity-60
            '
        ]) }}
    >
</div>
