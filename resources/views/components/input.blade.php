@props([
    'disabled' => false,
    'label' => null,
])

<div class="space-y-1">
    @if($label)
        <label class="block text-sm font-medium text-[#6B7A7A]">
            {{ $label }}
        </label>
    @endif

    <input
        {{ $disabled ? 'disabled' : '' }}
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
