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
               bg-[#FADADD] text-[#243434] hover:bg-[#FADADD]/80 border border-[#FADADD]
               focus:outline-none focus:ring-2 focus:ring-[#3B82F6]/40 focus:ring-offset-2 focus:ring-offset-[#FFF7EC]"
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

        <div class="relative w-full max-w-md rounded-3xl border border-[#E5EDEB] bg-[#FFF7EC] shadow-xl p-5">
            <h3 class="text-lg font-semibold text-[#243434]">{{ $title }}</h3>
            <p class="mt-2 text-sm text-[#6B7A7A]">{{ $message }}</p>

            <form method="POST" action="{{ $action }}" class="mt-5 flex justify-end gap-2">
                @csrf
                @method('DELETE')

                <button
                    type="button"
                    @click="open = false"
                    class="rounded-2xl px-4 py-2 text-sm font-semibold border border-[#E5EDEB] bg-[#FFFFFF] hover:bg-[#F3E6D6]
                           focus:outline-none focus:ring-2 focus:ring-[#3B82F6]/40 focus:ring-offset-2 focus:ring-offset-[#FFF7EC]"
                >
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="rounded-2xl px-4 py-2 text-sm font-semibold border border-[#FADADD] bg-[#FADADD] hover:bg-[#FADADD]/80
                           focus:outline-none focus:ring-2 focus:ring-[#3B82F6]/40 focus:ring-offset-2 focus:ring-offset-[#FFF7EC]"
                >
                    Sí, eliminar
                </button>
            </form>
        </div>
    </div>
</div>
