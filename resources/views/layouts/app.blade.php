<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Animals CRUD')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="min-h-screen bg-creamBrand text-slate-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <header class="mb-6">
            <div class="flex items-center justify-between">
                <a href="{{ route('animals.index') }}" class="flex items-center gap-2">
                    <div class="h-10 w-10 rounded-2xl bg-greenBrand/30 border border-greenBrand/40"></div>
                    <div>
                        <p class="text-sm text-slate-600">Dashboard</p>
                        <h1 class="text-lg font-semibold">Gestión de Animales</h1>
                    </div>
                </a>

                <div class="hidden sm:flex gap-2">
                    <x-button href="{{ route('animals.create') }}">+ Nuevo animal</x-button>
                </div>
            </div>
        </header>

        @if(session('success'))
            <div class="mb-5 rounded-2xl border border-greenBrand/40 bg-greenBrand/15 px-4 py-3 text-sm">
                <strong class="font-semibold">Listo:</strong> {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-5 rounded-2xl border border-orangeBrand/50 bg-orangeBrand/15 px-4 py-3 text-sm">
                <p class="font-semibold mb-1">Revisa estos detalles:</p>
                <ul class="list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            @yield('content')
        </main>

        <footer class="mt-10 text-xs text-slate-500">
            Hecho con Laravel + Blade + Tailwind.
        </footer>
    </div>
</body>
</html>
