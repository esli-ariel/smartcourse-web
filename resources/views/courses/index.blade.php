<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">
                Mes cours
            </h2>

            <a
                href="{{ route('courses.create') }}"
                class="rounded-xl bg-indigo-600 px-5 py-2.5 font-semibold text-white hover:bg-indigo-700"
            >
                + Ajouter un cours
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-6xl px-6">

            @if(session('success'))
    <div class="mb-6 rounded-lg bg-green-100 p-4 text-green-800">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="mb-6 rounded-lg bg-red-100 p-4 text-red-800">
        {{ session('error') }}
    </div>
@endif

            @if ($courses->isEmpty())

                <div class="rounded-2xl bg-white p-12 text-center shadow">

                    <div class="text-5xl">
                        📚
                    </div>

                    <h3 class="mt-4 text-xl font-bold text-gray-800">
                        Aucun cours
                    </h3>

                    <p class="mt-2 text-gray-500">
                        Vous n'avez encore ajouté aucun cours.
                    </p>

                    <a
                        href="{{ route('courses.create') }}"
                        class="mt-6 inline-block rounded-xl bg-indigo-600 px-6 py-3 font-semibold text-white hover:bg-indigo-700"
                    >
                        Ajouter mon premier cours
                    </a>

                </div>

            @else

                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                    @foreach ($courses as $course)

                        <div class="rounded-2xl bg-white p-6 shadow">

                            <div class="text-4xl">
                                📄
                            </div>

                            <h3 class="mt-4 font-bold text-gray-800">
                                {{ $course->title }}
                            </h3>

                            <p class="mt-2 text-sm text-gray-500">
                                {{ $course->file_name }}
                            </p>

                            <p class="mt-4 text-xs text-gray-400">
                                Ajouté le
                                {{ $course->created_at->format('d/m/Y') }}
                            </p>
                            <div class="mt-4">
                                <form
                                    action="{{ route('courses.summarize', $course) }}"
                                    method="POST"
                                >
                                @csrf

                                    <button
                                    type="submit"
                                    class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700"
                                    >
                                    🤖 Générer le résumé
                                </button>
                            </form>
                            </div>
                            @if($course->summary)

        <div class="mt-6 rounded-lg bg-gray-50 p-4">

            <h3 class="font-semibold text-gray-900">
                📝 Résumé
            </h3>

           <div class="prose prose-indigo max-w-none">
    {!! (new \League\CommonMark\CommonMarkConverter())->convert($course->summary)->getContent() !!}
</div>

        </div>

    @endif
                        </div>

                    @endforeach

                </div>

            @endif

        </div>
    </div>

</x-app-layout>