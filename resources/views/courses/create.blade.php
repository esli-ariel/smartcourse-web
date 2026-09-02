<x-app-layout>

    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Ajouter un cours
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-6">

            <div class="rounded-2xl bg-white p-8 shadow">

                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-800">
                        📚 Ajouter un cours
                    </h1>

                    <p class="mt-2 text-gray-500">
                        Téléversez votre cours afin de pouvoir le résumer avec l'IA.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 rounded-lg bg-red-50 p-4 text-red-700">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    action="{{ route('courses.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6"
                >

                    @csrf

                    <div>
                        <label
                            for="title"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Titre du cours
                        </label>

                        <input
                            type="text"
                            name="title"
                            id="title"
                            value="{{ old('title') }}"
                            placeholder="Exemple : Introduction aux probabilités"
                            class="w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >
                    </div>

                    <div>
                        <label
                            for="file"
                            class="mb-2 block text-sm font-medium text-gray-700"
                        >
                            Fichier du cours
                        </label>

                        <input
                            type="file"
                            name="file"
                            id="file"
                            accept=".pdf,.txt"
                            class="block w-full rounded-xl border border-gray-300 p-3"
                            required
                        >

                        <p class="mt-2 text-sm text-gray-500">
                            Formats acceptés : PDF ou TXT — 10 Mo maximum.
                        </p>
                    </div>

                    <div class="flex justify-end">
                        <button
                            type="submit"
                            class="rounded-xl bg-indigo-600 px-6 py-3 font-semibold text-white transition hover:bg-indigo-700"
                        >
                            📤 Téléverser le cours
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>