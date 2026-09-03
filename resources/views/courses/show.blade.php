<x-app-layout>

    {{-- En-tête --}}
    <x-slot name="header">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <a
                    href="{{ route('courses.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-indigo-600"
                >
                    ← Retour à mes cours
                </a>

                <h2 class="mt-3 text-2xl font-bold tracking-tight text-gray-900">
                    {{ $course->title }}
                </h2>

            </div>

            <div class="flex items-center gap-3">

                <a
                    href="{{ asset('storage/' . $course->file_path) }}"
                    target="_blank"
                    class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                >
                    📄 Voir le document
                </a>

                <form
                    action="{{ route('courses.summarize', $course) }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md"
                    >
                        🔄 Régénérer
                    </button>
                </form>

            </div>

        </div>

    </x-slot>


    {{-- Contenu --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-indigo-50/40 py-10">

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            {{-- Informations du cours --}}
            <div class="mb-8 overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600">
                </div>

                <div class="p-6 sm:p-8">

                    <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-3xl">
                                📚
                            </div>

                            <div>

                                <p class="text-sm font-medium text-indigo-600">
                                    Document pédagogique
                                </p>

                                <h1 class="mt-1 text-xl font-bold text-gray-900">
                                    {{ $course->title }}
                                </h1>

                                <p class="mt-1 text-sm text-gray-500">
                                    📎 {{ $course->file_name }}
                                </p>

                            </div>

                        </div>


                        <div class="rounded-2xl bg-green-50 px-4 py-3">

                            <div class="flex items-center gap-2">

                                <span class="flex h-8 w-8 items-center justify-center rounded-full bg-green-100 text-green-600">
                                    ✓
                                </span>

                                <div>
                                    <p class="text-xs font-medium text-green-600">
                                        Statut
                                    </p>

                                    <p class="text-sm font-bold text-green-700">
                                        Résumé disponible
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- Résumé --}}
            @if($course->summary)

                <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                    {{-- Header du résumé --}}
                    <div class="border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50 px-6 py-6 sm:px-8">

                        <div class="flex items-start gap-4">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-indigo-600 text-2xl shadow-sm">
                                🤖
                            </div>

                            <div>

                                <h2 class="text-xl font-bold text-gray-900">
                                    Résumé intelligent
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    Résumé généré automatiquement par
                                    <span class="font-semibold text-indigo-600">
                                        SmartCourse AI
                                    </span>
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- Contenu du résumé --}}
                    <div class="p-6 sm:p-8">

                        <div class="summary-content">

                            {!! (new \League\CommonMark\CommonMarkConverter())->convert($course->summary)->getContent() !!}

                        </div>

                    </div>

                </div>


                {{-- Actions du bas --}}
                <div class="mt-6 flex flex-col gap-3 sm:flex-row sm:justify-between">

                    <a
                        href="{{ route('courses.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50"
                    >
                        ← Retour à mes cours
                    </a>


                    <form
                        action="{{ route('courses.summarize', $course) }}"
                        method="POST"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-indigo-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 sm:w-auto"
                        >
                            🔄 Générer un nouveau résumé
                        </button>

                    </form>

                </div>

            @else

                {{-- Aucun résumé --}}
                <div class="rounded-3xl border border-dashed border-gray-300 bg-white px-6 py-16 text-center shadow-sm">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-indigo-50 text-4xl">
                        🤖
                    </div>

                    <h2 class="mt-6 text-2xl font-bold text-gray-900">
                        Aucun résumé disponible
                    </h2>

                    <p class="mx-auto mt-3 max-w-lg text-gray-500">
                        SmartCourse peut analyser automatiquement ce document
                        et générer un résumé pédagogique contenant les notions
                        importantes, les définitions et les points essentiels.
                    </p>


                    <form
                        action="{{ route('courses.summarize', $course) }}"
                        method="POST"
                        class="mt-8"
                    >
                        @csrf

                        <button
                            type="submit"
                            class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md"
                        >
                            🤖 Générer mon résumé
                        </button>

                    </form>

                </div>

            @endif

        </div>

    </div>


    {{-- Style du résumé --}}
    <style>

        .summary-content {
            color: #374151;
            line-height: 1.8;
            font-size: 1rem;
        }

        .summary-content h1 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
        }

        .summary-content h2 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 1px solid #e5e7eb;
            font-size: 1.4rem;
            font-weight: 800;
            color: #312e81;
        }

        .summary-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.7rem;
            font-size: 1.15rem;
            font-weight: 700;
            color: #4338ca;
        }

        .summary-content p {
            margin-top: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .summary-content ul {
            margin-top: 1rem;
            margin-bottom: 1rem;
            padding-left: 1.5rem;
            list-style-type: disc;
        }

        .summary-content ol {
            margin-top: 1rem;
            margin-bottom: 1rem;
            padding-left: 1.5rem;
            list-style-type: decimal;
        }

        .summary-content li {
            margin-top: 0.4rem;
            margin-bottom: 0.4rem;
        }

        .summary-content strong {
            font-weight: 700;
            color: #111827;
        }

        .summary-content blockquote {
            margin: 1.5rem 0;
            border-left: 4px solid #6366f1;
            border-radius: 0.5rem;
            background: #eef2ff;
            padding: 1rem 1.2rem;
            color: #4338ca;
        }

        .summary-content code {
            border-radius: 0.4rem;
            background: #f3f4f6;
            padding: 0.15rem 0.4rem;
            font-size: 0.9em;
        }

        .summary-content pre {
            overflow-x: auto;
            margin: 1.5rem 0;
            border-radius: 1rem;
            background: #111827;
            padding: 1.2rem;
            color: #f9fafb;
        }

        .summary-content hr {
            margin: 2rem 0;
            border: 0;
            border-top: 1px solid #e5e7eb;
        }

    </style>

</x-app-layout>