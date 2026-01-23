@props(['paginator'])

@if ($paginator->hasPages())
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="text-xs text-slate-600">
            Mostrando
            <span class="font-semibold">{{ $paginator->firstItem() }}</span>
            a
            <span class="font-semibold">{{ $paginator->lastItem() }}</span>
            de
            <span class="font-semibold">{{ $paginator->total() }}</span>
            resultados
        </div>

        <div class="inline-flex items-center gap-2">
            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 rounded-2xl border border-beigeBrand/70 bg-white/50 text-xs text-slate-400">Anterior</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-2 rounded-2xl border border-beigeBrand/70 bg-white/70 text-xs hover:bg-pinkBrand/60">
                    Anterior
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($paginator->getUrlRange(max(1, $paginator->currentPage() - 2), min($paginator->lastPage(), $paginator->currentPage() + 2)) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="px-3 py-2 rounded-2xl border border-greenBrand/60 bg-greenBrand/20 text-xs font-semibold">{{ $page }}</span>
                @else
                    <a href="{{ $url }}"
                       class="px-3 py-2 rounded-2xl border border-beigeBrand/70 bg-white/70 text-xs hover:bg-pinkBrand/60">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-2 rounded-2xl border border-beigeBrand/70 bg-white/70 text-xs hover:bg-pinkBrand/60">
                    Siguiente
                </a>
            @else
                <span class="px-3 py-2 rounded-2xl border border-beigeBrand/70 bg-white/50 text-xs text-slate-400">Siguiente</span>
            @endif
        </div>
    </div>
@endif
