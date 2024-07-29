<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crime Tracker</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="flex flex-row items-center gap-2 py-10">
                        <div class="flex flex-row flex-grow space-x-2 items-center">
                            <img src="{{ asset('imgs/icon.png') }}" alt="Crime Tracker" class="h-12 w-auto">
                            <p class="text-2xl font-bold">Crime Tracker</p>
                        </div>
                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>

                    <main class="mt-6">
                        <livewire:create-entry-form />
                    </main>

                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Crime-Tracker v0.0.1
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
