<nav
    x-data="{ open: false }"
    class="border-b border-gray-100 bg-white/95 shadow-sm backdrop-blur"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex h-20 items-center justify-between">

            {{-- Logo SmartCourse --}}
            <div class="flex items-center">

                <a
                    href="{{ route('courses.index') }}"
                    class="flex items-center gap-3"
                >

                    {{-- Icône --}}
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-indigo-600 text-xl text-white shadow-sm"
                    >
                        🎓
                    </div>

                    {{-- Nom --}}
                    <div class="hidden sm:block">

                        <div class="text-lg font-extrabold tracking-tight text-gray-900">
                            Smart<span class="text-indigo-600">Course</span>
                        </div>

                        <div class="text-[11px] font-medium uppercase tracking-wider text-gray-400">
                            Learn smarter
                        </div>

                    </div>

                </a>

            </div>


            {{-- Navigation desktop --}}
            <div class="hidden items-center gap-2 md:flex">

                {{-- Mes cours --}}
                <a
                    href="{{ route('courses.index') }}"
                    class="{{ request()->routeIs('courses.index')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                        inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition"
                >
                    <span>📚</span>
                    Mes cours
                </a>


                {{-- Ajouter un cours --}}
                <a
                    href="{{ route('courses.create') }}"
                    class="{{ request()->routeIs('courses.create')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}
                        inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold transition"
                >
                    <span>＋</span>
                    Ajouter un cours
                </a>

            </div>


            {{-- Partie droite --}}
            <div class="hidden items-center gap-4 md:flex">

            {{-- Bouton thème --}}
<div
    x-data="themeSwitcher"
    class="flex items-center"
>
    <button
        type="button"
        @click="toggle()"
        class="flex h-10 w-10 items-center justify-center rounded-xl text-lg text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white"
        :title="dark ? 'Activer le mode clair' : 'Activer le mode sombre'"
    >

        <span x-show="!dark">
            🌙
        </span>

        <span x-show="dark">
            ☀️
        </span>

    </button>
</div>
                {{-- Séparateur --}}
                <div class="h-8 w-px bg-gray-200"></div>


                {{-- Utilisateur --}}
                <div class="flex items-center gap-3">

                    {{-- Avatar --}}
                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700"
                    >
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>


                    {{-- Nom --}}
                    <div class="hidden lg:block">

                        <p class="max-w-[150px] truncate text-sm font-semibold text-gray-800">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-gray-400">
                            Étudiant
                        </p>

                    </div>


                    {{-- Déconnexion --}}
                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            title="Se déconnecter"
                            class="flex h-10 w-10 items-center justify-center rounded-xl text-gray-400 transition hover:bg-red-50 hover:text-red-600"
                        >
                            ↪
                        </button>

                    </form>

                </div>

            </div>


            {{-- Bouton mobile --}}
            <div class="flex md:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex h-10 w-10 items-center justify-center rounded-xl text-gray-500 transition hover:bg-gray-100 hover:text-gray-700"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            x-show="!open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            x-show="open"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>


        {{-- Menu mobile --}}
        <div
            x-show="open"
            x-transition
            class="border-t border-gray-100 py-4 md:hidden"
        >

            <div class="space-y-2">

                {{-- Mes cours --}}
                <a
                    href="{{ route('courses.index') }}"
                    class="{{ request()->routeIs('courses.index')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50' }}
                        flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition"
                >
                    <span>📚</span>
                    Mes cours
                </a>


                {{-- Ajouter --}}
                <a
                    href="{{ route('courses.create') }}"
                    class="{{ request()->routeIs('courses.create')
                        ? 'bg-indigo-50 text-indigo-700'
                        : 'text-gray-600 hover:bg-gray-50' }}
                        flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold transition"
                >
                    <span>＋</span>
                    Ajouter un cours
                </a>

            </div>


            {{-- Utilisateur mobile --}}
            <div class="mt-4 border-t border-gray-100 pt-4">

                <div class="flex items-center gap-3 px-4">

                    <div
                        class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 font-bold text-indigo-700"
                    >
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>

                        <p class="text-sm font-semibold text-gray-800">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-xs text-gray-400">
                            Étudiant
                        </p>

                    </div>

                </div>


                {{-- Déconnexion mobile --}}
                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="mt-3"
                >

                    @csrf

                    <button
                        type="submit"
                        class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-50"
                    >
                        <span>↪</span>
                        Se déconnecter
                    </button>

                </form>

            </div>

        </div>

    </div>

</nav>