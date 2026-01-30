@props([
    'variant' => 'primary',
])

@php
    $base = 'inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-medium transition focus:outline-none';

    $variants = [
        // Botón principal
        'primary' => 'bg-[#3FAF7A] text-white hover:bg-[#2E8B62]',

        // Botón secundario (beige / sand)
        'secondary' => 'border border-[#E5EDEB] bg-[#FFF7EC] text-[#243434] hover:bg-[#F3E6D6]',

        // Botón editar (azul)
        'edit' => 'bg-[#3B82F6] text-white hover:bg-[#2563EB]',

        // Botón eliminar (rojo suave)
        'danger' => 'bg-[#FADADD] text-[#243434] hover:bg-[#F6C1C6]',
    ];

    // Fallback de seguridad
    $variantClasses = $variants[$variant] ?? $variants['primary'];

    // Si quieres poder forzar estilos desde la vista, esto lo permite:
    $classes = trim("$base $variantClasses");
@endphp

@if ($attributes->has('href'))
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
