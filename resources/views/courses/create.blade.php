<x-app-layout>

    {{-- En-tête --}}
    <x-slot name="header">

        <div>
            <a
                href="{{ route('courses.index') }}"
                class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 transition hover:text-indigo-600"
            >
                ← Retour à mes cours
            </a>

            <h2 class="mt-3 text-2xl font-bold tracking-tight text-gray-900">
                Ajouter un cours 📚
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Importez votre document et laissez SmartCourse préparer son résumé.
            </p>
        </div>

    </x-slot>


    {{-- Contenu --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-indigo-50/40 py-10">

        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">

            {{-- Carte principale --}}
            <div class="overflow-hidden rounded-3xl border border-gray-100 bg-white shadow-sm">

                {{-- Bandeau --}}
                <div class="h-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-600">
                </div>


                <div class="p-6 sm:p-8">

                    {{-- Introduction --}}
                    <div class="mb-8 text-center">

                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-2xl bg-indigo-50 text-4xl">
                            📄
                        </div>

                        <h1 class="mt-5 text-2xl font-bold text-gray-900">
                            Importer un nouveau cours
                        </h1>

                        <p class="mx-auto mt-2 max-w-xl text-sm leading-6 text-gray-500">
                            Ajoutez un document PDF ou TXT. SmartCourse analysera
                            automatiquement son contenu afin de vous permettre
                            de générer un résumé intelligent.
                        </p>

                    </div>


                    {{-- Erreurs --}}
                    @if ($errors->any())

                        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4">

                            <div class="flex gap-3">

                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                                    !
                                </div>

                                <div>

                                    <p class="font-semibold text-red-800">
                                        Vérifiez les informations saisies
                                    </p>

                                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">

                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif


                    {{-- Formulaire --}}
                    <form
                        action="{{ route('courses.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-7"
                    >

                        @csrf


                        {{-- Titre --}}
                        <div>

                            <label
                                for="title"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Titre du cours
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title') }}"
                                placeholder="Exemple : Algorithmique et structures de données"
                                required
                                class="w-full rounded-xl border-gray-300 px-4 py-3 text-sm shadow-sm transition focus:border-indigo-500 focus:ring-indigo-500"
                            >

                            <p class="mt-2 text-xs text-gray-400">
                                Donnez un titre permettant d'identifier facilement votre cours.
                            </p>

                        </div>


                        {{-- Zone fichier --}}
                        <div>

                            <label
                                for="file"
                                class="mb-2 block text-sm font-semibold text-gray-700"
                            >
                                Document du cours
                            </label>


                            <label
                                for="file"
                                id="drop-zone"
                                class="group flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 px-6 py-12 text-center transition hover:border-indigo-400 hover:bg-indigo-50/50"
                            >

                                <div
                                    id="upload-icon"
                                    class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-3xl shadow-sm transition group-hover:scale-105"
                                >
                                    📤
                                </div>


                                <div id="upload-text">

                                    <p class="mt-5 text-base font-semibold text-gray-800">
                                        Cliquez pour choisir votre document
                                    </p>

                                    <p class="mt-2 text-sm text-gray-500">
                                        ou faites glisser votre fichier ici
                                    </p>

                                </div>


                                <div
                                    id="file-preview"
                                    class="mt-5 hidden"
                                >

                                    <div class="flex items-center gap-3 rounded-xl bg-white px-4 py-3 shadow-sm">

                                        <span class="text-2xl">
                                            📄
                                        </span>

                                        <div class="text-left">

                                            <p
                                                id="file-name"
                                                class="max-w-xs truncate text-sm font-semibold text-gray-800"
                                            >
                                            </p>

                                            <p
                                                id="file-size"
                                                class="text-xs text-gray-400"
                                            >
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                <span class="mt-5 rounded-lg bg-indigo-600 px-4 py-2 text-xs font-semibold text-white transition group-hover:bg-indigo-700">
                                    Choisir un fichier
                                </span>


                                <p class="mt-4 text-xs text-gray-400">
                                    PDF ou TXT • Taille maximale : 10 Mo
                                </p>


                                <input
                                    type="file"
                                    id="file"
                                    name="file"
                                    accept=".pdf,.txt"
                                    required
                                    class="hidden"
                                >

                            </label>

                        </div>


                        {{-- Fonctionnement --}}
                        <div class="rounded-2xl bg-indigo-50 p-5">

                            <div class="flex items-start gap-4">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-indigo-100 text-xl">
                                    🤖
                                </div>

                                <div>

                                    <h3 class="font-semibold text-indigo-900">
                                        Comment fonctionne SmartCourse ?
                                    </h3>

                                    <p class="mt-1 text-sm leading-6 text-indigo-700">
                                        Après l'importation, le contenu de votre document
                                        sera extrait. Vous pourrez ensuite demander à
                                        SmartCourse AI de générer automatiquement un résumé
                                        structuré.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Boutons --}}
                        <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row sm:justify-end">

                            <a
                                href="{{ route('courses.index') }}"
                                class="inline-flex items-center justify-center rounded-xl border border-gray-200 bg-white px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                            >
                                Annuler
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 hover:shadow-md"
                            >
                                <span>📚</span>
                                Ajouter le cours
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Étapes --}}
            <div class="mt-8 grid gap-4 sm:grid-cols-3">

                <div class="rounded-2xl border border-gray-100 bg-white p-5 text-center shadow-sm">

                    <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-50 text-lg">
                        1
                    </div>

                    <h3 class="mt-3 text-sm font-bold text-gray-900">
                        Importer
                    </h3>

                    <p class="mt-1 text-xs leading-5 text-gray-500">
                        Ajoutez votre document pédagogique.
                    </p>

                </div>


                <div class="rounded-2xl border border-gray-100 bg-white p-5 text-center shadow-sm">

                    <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl bg-purple-50 text-lg">
                        2
                    </div>

                    <h3 class="mt-3 text-sm font-bold text-gray-900">
                        Analyser
                    </h3>

                    <p class="mt-1 text-xs leading-5 text-gray-500">
                        SmartCourse extrait le contenu du cours.
                    </p>

                </div>


                <div class="rounded-2xl border border-gray-100 bg-white p-5 text-center shadow-sm">

                    <div class="mx-auto flex h-10 w-10 items-center justify-center rounded-xl bg-green-50 text-lg">
                        3
                    </div>

                    <h3 class="mt-3 text-sm font-bold text-gray-900">
                        Résumer
                    </h3>

                    <p class="mt-1 text-xs leading-5 text-gray-500">
                        L'IA génère votre résumé pédagogique.
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- JavaScript pour l'aperçu du fichier --}}
    <script>

        const fileInput = document.getElementById('file');
        const dropZone = document.getElementById('drop-zone');

        const uploadText = document.getElementById('upload-text');
        const uploadIcon = document.getElementById('upload-icon');

        const filePreview = document.getElementById('file-preview');
        const fileName = document.getElementById('file-name');
        const fileSize = document.getElementById('file-size');


        fileInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }


            // Afficher le nom
            fileName.textContent = file.name;


            // Afficher la taille
            const sizeInMB = file.size / (1024 * 1024);

            if (sizeInMB < 1) {

                fileSize.textContent =
                    Math.round(file.size / 1024) + ' Ko';

            } else {

                fileSize.textContent =
                    sizeInMB.toFixed(2) + ' Mo';

            }


            // Modifier l'interface
            uploadText.classList.add('hidden');

            uploadIcon.textContent = '✓';

            uploadIcon.classList.remove('bg-white');

            uploadIcon.classList.add(
                'bg-green-50',
                'text-green-600'
            );

            filePreview.classList.remove('hidden');

        });


        // Drag & Drop
        dropZone.addEventListener('dragover', function (event) {

            event.preventDefault();

            dropZone.classList.add(
                'border-indigo-500',
                'bg-indigo-50'
            );

        });


        dropZone.addEventListener('dragleave', function () {

            dropZone.classList.remove(
                'border-indigo-500',
                'bg-indigo-50'
            );

        });


        dropZone.addEventListener('drop', function (event) {

            event.preventDefault();

            dropZone.classList.remove(
                'border-indigo-500',
                'bg-indigo-50'
            );


            const files = event.dataTransfer.files;

            if (files.length > 0) {

                fileInput.files = files;

                fileInput.dispatchEvent(
                    new Event('change')
                );

            }

        });

    </script>

</x-app-layout>