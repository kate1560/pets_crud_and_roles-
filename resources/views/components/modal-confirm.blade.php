@props([
  'title' => 'Confirmar',
  'message' => '¿Estás seguro?',
  'action' => '#',
])

<div x-data="{ open: false }">
    <button
        type="button"
        @click="open = true"
        class="inline-flex items-center justify-center rounded-2xl px-4 py-2 text-sm font-semibold transition
               bg-orangeBrand/25 text-slate-900 hover:bg-orangeBrand/40 border border-orangeBrand/50
               focus:outline-none focus:ring-2 focus:ring-orangeBrand/40 focus:ring-offset-2 focus:ring-offset-creamBrand"
    >
        Eliminar
    </button>

    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        style="display:none"
        aria-modal="true"
        role="dialog"
    >
        <div class="absolute inset-0 bg-black/30" @click="open = false"></div>

        <div class="relative w-full max-w-md rounded-3xl border border-beigeBrand/60 bg-creamBrand shadow-xl p-5">
            <h3 class="text-lg font-semibold">{{ $title }}</h3>
            <p class="mt-2 text-sm text-slate-700">{{ $message }}</p>

            <form method="POST" action="{{ $action }}" class="mt-5 flex justify-end gap-2">
                @csrf
                @method('DELETE')

                <button
                    type="button"
                    @click="open = false"
                    class="rounded-2xl px-4 py-2 text-sm font-semibold border border-beigeBrand/70 bg-white/70 hover:bg-pinkBrand/60
                           focus:outline-none focus:ring-2 focus:ring-orangeBrand/40 focus:ring-offset-2 focus:ring-offset-creamBrand"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="rounded-2xl px-4 py-2 text-sm font-semibold border border-orangeBrand/60 bg-orangeBrand/40 hover:bg-orangeBrand/55
                           focus:outline-none focus:ring-2 focus:ring-orangeBrand/40 focus:ring-offset-2 focus:ring-offset-creamBrand"
                >
                    Sí, eliminar
                </button>
            </form>
        </div>
    </div>
</div>
