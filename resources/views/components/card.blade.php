@props(['class' => ''])

<div {{ $attributes->merge([
    'class' => "rounded-3xl border border-[#E5EDEB] bg-[#FFFFFF] shadow-sm backdrop-blur px-5 py-5 {$class}"
]) }}>
    {{ $slot }}
</div>
