@props(['paginator'])

@if ($paginator->hasPages())
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="text-xs text-[#6B7A7A]">
            Mostrando
            <span class="font-semibold text-[#243434]">{{ $paginator->firstItem() }}</span>
            a
            <span class="font-semibold text-[#243434]">{{ $paginator->lastItem() }}</span>
            de
            <span class="font-semibold text-[#243434]">{{ $paginator->total() }}</span>
            resultados
        </div>

        <div class="inline-flex items-center gap-2">
            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <span class="px-3 py-2 rounded-2xl border border-[#E5EDEB] bg-[#FFFFFF]/60 text-xs text-[#6B7A7A]/60">
                    Anterior
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-3 py-2 rounded-2xl border border-[#E5EDEB] bg-[#FFFFFF] text-xs text-[#243434] hover:bg-[#F3E6D6]">
                    Anterior
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($paginator->getUrlRange(max(1, $paginator->currentPage() - 2), min($paginator->lastPage(), $paginator->currentPage() + 2)) as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="px-3 py-2 rounded-2xl border border-[#CFEDE0] bg-[#CFEDE0] text-xs font-semibold text-[#243434]">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $url }}"
                       class="px-3 py-2 rounded-2xl border border-[#E5EDEB] bg-[#FFFFFF] text-xs text-[#243434] hover:bg-[#F3E6D6]">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-3 py-2 rounded-2xl border border-[#E5EDEB] bg-[#FFFFFF] text-xs text-[#243434] hover:bg-[#F3E6D6]">
                    Siguiente
                </a>
            @else
                <span class="px-3 py-2 rounded-2xl border border-[#E5EDEB] bg-[#FFFFFF]/60 text-xs text-[#6B7A7A]/60">
                    Siguiente
                </span>
            @endif
        </div>
    </div>
@endif
