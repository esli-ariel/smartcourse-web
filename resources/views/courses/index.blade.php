<x-app-layout>

    {{-- En-tête --}}
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <p class="text-sm font-medium text-indigo-600">
                    Espace étudiant
                </p>

                <h2 class="mt-1 text-2xl font-bold tracking-tight text-gray-900">
                    Mes cours 📚
                </h2>

                <p class="mt-1 text-sm text-gray-500">
                    Gérez vos cours et créez rapidement vos résumés avec l'IA.
                </p>
            </div>

            <a
                href="{{ route('courses.create') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md"
            >
                <span class="text-lg">+</span>
                Ajouter un cours
            </a>

        </div>
    </x-slot>


    {{-- Contenu principal --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-indigo-50/40 py-10">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Messages --}}
            @if(session('success'))
                <div class="mb-8 flex items-start gap-3 rounded-2xl border border-green-200 bg-green-50 p-4 text-green-800 shadow-sm">
                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-100">
                        ✓
                    </div>

                    <div>
                        <p class="font-semibold">Opération réussie</p>
                        <p class="mt-1 text-sm">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            @endif


            @if(session('error'))
                <div class="mb-8 flex items-start gap-3 rounded-2xl border border-red-200 bg-red-50 p-4 text-red-800 shadow-sm">
                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100">
                        !
                    </div>

                    <div>
                        <p class="font-semibold">Une erreur est survenue</p>
                        <p class="mt-1 text-sm">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            @endif


            {{-- Statistiques --}}
            <div class="mb-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                {{-- Total cours --}}
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Total des cours
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900">
                                {{ $courses->count() }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-2xl">
                            📚
                        </div>

                    </div>

                </div>


                {{-- Résumés --}}
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                Résumés générés
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900">
                                {{ $courses->whereNotNull('summary')->count() }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-2xl">
                            🤖
                        </div>

                    </div>

                </div>


                {{-- Cours sans résumé --}}
                <div class="rounded-2xl border border-gray-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-md">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-sm font-medium text-gray-500">
                                À résumer
                            </p>

                            <p class="mt-2 text-3xl font-bold text-gray-900">
                                {{ $courses->whereNull('summary')->count() }}
                            </p>
                        </div>

                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-2xl">
                            ✨
                        </div>

                    </div>

                </div>

            </div>


            {{-- Titre section --}}
            <div class="mb-6 flex items-center justify-between">

                <div>
                    <h3 class="text-xl font-bold text-gray-900">
                        Votre bibliothèque
                    </h3>

                    <p class="mt-1 text-sm text-gray-500">
                        Retrouvez ici tous vos documents pédagogiques.
                    </p>
                </div>

            </div>


            {{-- Aucun cours --}}
            @if ($courses->isEmpty())

                <div class="rounded-3xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center shadow-sm">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-indigo-50 text-4xl">
                        📚
                    </div>

                    <h3 class="mt-6 text-2xl font-bold text-gray-900">
                        Votre bibliothèque est vide
                    </h3>

                    <p class="mx-auto mt-3 max-w-md text-gray-500">
                        Ajoutez votre premier cours et laissez SmartCourse
                        vous aider à réviser plus efficacement.
                    </p>

                    <a
                        href="{{ route('courses.create') }}"
                        class="mt-8 inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md"
                    >
                        <span class="text-lg">+</span>
                        Ajouter mon premier cours
                    </a>

                </div>

            @else

                {{-- Liste des cours --}}
                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">

                    @foreach ($courses as $course)

                        <div class="group overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">

                            {{-- Bandeau --}}
                            <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600">
                            </div>


                            <div class="p-6">

                                {{-- Icône + statut --}}
                                <div class="flex items-start justify-between">

                                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-3xl transition group-hover:scale-110">
                                        📄
                                    </div>

                                    @if($course->summary)

                                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-3 py-1 text-xs font-semibold text-green-700">
                                            <span>✓</span>
                                            Résumé disponible
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1 rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">
                                            <span>⏳</span>
                                            À résumer
                                        </span>

                                    @endif

                                </div>


                                {{-- Informations --}}
                                <div class="mt-5">

                                    <h4 class="line-clamp-2 text-lg font-bold text-gray-900">
                                        {{ $course->title }}
                                    </h4>

                                    <div class="mt-3 flex items-center gap-2 text-sm text-gray-500">

                                        <span>📎</span>

                                        <span class="truncate">
                                            {{ $course->file_name }}
                                        </span>

                                    </div>

                                    <p class="mt-3 text-xs text-gray-400">
                                        Ajouté le
                                        {{ $course->created_at->format('d/m/Y à H:i') }}
                                    </p>

                                </div>


                                {{-- Actions --}}
                                <div class="mt-6 border-t border-gray-100 pt-5">

                                    @if($course->summary)

                                        <a
                                            href="{{ route('courses.show', $course) }}"
                                            class="flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                        >
                                            <span>📝</span>
                                            Voir le résumé
                                        </a>

                                    @else

                                        <form
                                            action="{{ route('courses.summarize', $course) }}"
                                            method="POST"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                class="flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-3 text-sm font-semibold text-white transition hover:bg-indigo-700"
                                            >
                                                <span>🤖</span>
                                                Générer le résumé
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @endif

        </div>

    </div>

</x-app-layout>