@props([
    'label' => null,
    'name',
    'options' => [],
    'selected' => '',
])

<div>
    @if($label)
        <label class="block text-sm font-medium text-slate-700 mb-1">{{ $label }}</label>
    @endif

    <select
        name="{{ $name }}"
        {{ $attributes->merge([
            'class' => "w-full rounded-2xl border border-beigeBrand/70 bg-white/70 px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-orangeBrand/40 focus:border-orangeBrand/70"
        ]) }}
    >
        <option value="">Selecciona…</option>
        @foreach($options as $opt)
            <option value="{{ $opt }}" @selected($selected === $opt)>{{ $opt }}</option>
        @endforeach
    </select>
</div>
