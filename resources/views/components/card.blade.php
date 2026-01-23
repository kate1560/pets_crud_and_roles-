@props(['class' => ''])

<div {{ $attributes->merge([
    'class' => "rounded-3xl border border-beigeBrand/60 bg-white/70 shadow-sm backdrop-blur px-5 py-5 {$class}"
]) }}>
    {{ $slot }}
</div>
