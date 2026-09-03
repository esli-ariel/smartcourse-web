<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="h-full"
>
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        {{ config('app.name', 'SmartCourse') }}
    </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap"
        rel="stylesheet"
    />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-full font-sans antialiased
           bg-gray-50 dark:bg-gray-950
           text-gray-900 dark:text-gray-100
           transition-colors duration-300"
>

    <div
        x-data="themeSwitcher"
        class="min-h-screen relative overflow-hidden"
    >

        <!-- ========================================= -->
        <!-- Arrière-plan décoratif -->
        <!-- ========================================= -->

        <div
            class="pointer-events-none absolute -top-40 -right-40
                   h-96 w-96 rounded-full
                   bg-indigo-200/40 dark:bg-indigo-900/20
                   blur-3xl"
        ></div>

        <div
            class="pointer-events-none absolute -bottom-40 -left-40
                   h-96 w-96 rounded-full
                   bg-purple-200/40 dark:bg-purple-900/20
                   blur-3xl"
        ></div>


        <!-- ========================================= -->
        <!-- Bouton mode clair / sombre -->
        <!-- ========================================= -->

        <div class="absolute top-5 right-5 z-50">

            <button
                type="button"
                @click="toggle()"
                class="flex h-11 w-11 items-center justify-center
                       rounded-xl
                       border border-gray-200 dark:border-gray-700
                       bg-white dark:bg-gray-900
                       text-gray-600 dark:text-gray-300
                       shadow-sm
                       hover:bg-gray-100 dark:hover:bg-gray-800
                       hover:scale-105
                       transition-all duration-200"
                :title="dark
                    ? 'Activer le mode clair'
                    : 'Activer le mode sombre'"
            >

                <span
                    x-show="!dark"
                    x-transition
                    class="text-lg"
                >
                    🌙
                </span>

                <span
                    x-show="dark"
                    x-transition
                    class="text-lg"
                >
                    ☀️
                </span>

            </button>

        </div>


        <!-- ========================================= -->
        <!-- Contenu -->
        <!-- ========================================= -->

        <main
            class="relative z-10 min-h-screen
                   flex items-center justify-center
                   px-4 py-10 sm:px-6"
        >

            <div class="w-full max-w-5xl">

                <!-- Logo SmartCourse -->

                <div class="mb-8 text-center">

                    <a
                        href="{{ url('/') }}"
                        class="inline-flex items-center gap-3
                               group"
                    >

                        <div
                            class="flex h-12 w-12
                                   items-center justify-center
                                   rounded-2xl
                                   bg-indigo-600
                                   text-2xl
                                   shadow-lg shadow-indigo-500/20
                                   group-hover:scale-105
                                   transition-transform"
                        >
                            🎓
                        </div>

                        <div class="text-left">

                            <h1
                                class="text-2xl font-bold
                                       text-gray-900
                                       dark:text-white"
                            >
                                SmartCourse
                            </h1>

                            <p
                                class="text-xs font-medium
                                       text-gray-500
                                       dark:text-gray-400"
                            >
                                Learn smarter
                            </p>

                        </div>

                    </a>

                </div>


                <!-- ================================= -->
                <!-- Carte principale -->
                <!-- ================================= -->

                <div
                    class="overflow-hidden
                           rounded-3xl
                           border border-gray-200
                           dark:border-gray-800
                           bg-white dark:bg-gray-900
                           shadow-2xl
                           shadow-gray-200/50
                           dark:shadow-black/30"
                >

                    {{ $slot }}

                </div>


                <!-- Footer -->

                <p
                    class="mt-6 text-center text-xs
                           text-gray-400 dark:text-gray-600"
                >
                    © {{ date('Y') }} SmartCourse
                    — Learn smarter.
                </p>

            </div>

        </main>

    </div>

</body>
</html>