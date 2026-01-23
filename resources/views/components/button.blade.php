@props([
    'variant' => 'primary',
    'type' => 'button',
    'href' => null,
])

@php
  $base = "inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-semibold transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-creamBrand";
  $primary = "bg-greenBrand text-slate-900 hover:bg-greenBrand/90 focus:ring-greenBrand/50 border border-greenBrand/60";
  $secondary = "bg-pinkBrand/60 text-slate-900 hover:bg-pinkBrand/80 focus:ring-orangeBrand/40 border border-beigeBrand/70";
@endphp

@if($href)
  <a href="{{ $href }}" class="{{ $base }} {{ $variant === 'secondary' ? $secondary : $primary }}">
      {{ $slot }}
  </a>
@else
  <button type="{{ $type }}" {{ $attributes->merge(['class' => $base.' '.($variant === 'secondary' ? $secondary : $primary)]) }}>
      {{ $slot }}
  </button>
@endif
