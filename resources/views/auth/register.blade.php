<x-guest-layout>

    <div class="grid lg:grid-cols-2">

        <!-- ========================================= -->
        <!-- Partie présentation -->
        <!-- ========================================= -->

        <div
            class="hidden lg:flex flex-col justify-center
                   bg-gradient-to-br
                   from-indigo-600 to-purple-700
                   p-12 text-white"
        >

            <div class="mb-8 text-6xl">
                🚀
            </div>

            <h2 class="text-4xl font-bold leading-tight">
                Commencez votre
                <span class="text-indigo-200">
                    expérience SmartCourse.
                </span>
            </h2>

            <p class="mt-5 text-lg leading-8 text-indigo-100">
                Créez votre compte et découvrez une nouvelle
                façon d'apprendre grâce à l'intelligence artificielle.
            </p>


            <div class="mt-10 space-y-5">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-10 w-10 items-center justify-center
                               rounded-xl bg-white/10"
                    >
                        📚
                    </div>

                    <div>
                        <p class="font-semibold">
                            Centralisez vos cours
                        </p>

                        <p class="text-sm text-indigo-200">
                            Gardez vos documents accessibles.
                        </p>
                    </div>

                </div>


                <div class="flex items-center gap-4">

                    <div
                        class="flex h-10 w-10 items-center justify-center
                               rounded-xl bg-white/10"
                    >
                        🤖
                    </div>

                    <div>
                        <p class="font-semibold">
                            Utilisez l'intelligence artificielle
                        </p>

                        <p class="text-sm text-indigo-200">
                            Résumez vos cours automatiquement.
                        </p>
                    </div>

                </div>


                <div class="flex items-center gap-4">

                    <div
                        class="flex h-10 w-10 items-center justify-center
                               rounded-xl bg-white/10"
                    >
                        🧠
                    </div>

                    <div>
                        <p class="font-semibold">
                            Préparez vos révisions
                        </p>

                        <p class="text-sm text-indigo-200">
                            Quiz et révisions intelligentes.
                        </p>
                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================= -->
        <!-- Formulaire inscription -->
        <!-- ========================================= -->

        <div class="p-8 sm:p-12">

            <div class="mb-8">

                <div
                    class="mb-5 flex h-14 w-14 items-center justify-center
                           rounded-2xl
                           bg-indigo-100
                           dark:bg-indigo-950
                           text-2xl"
                >
                    🎓
                </div>

                <h2
                    class="text-3xl font-bold
                           text-gray-900 dark:text-white"
                >
                    Créer un compte
                </h2>

                <p
                    class="mt-2
                           text-gray-500
                           dark:text-gray-400"
                >
                    Rejoignez SmartCourse et apprenez plus efficacement.
                </p>

            </div>


            <form
                method="POST"
                action="{{ route('register') }}"
            >

                @csrf


                <!-- Nom -->

                <div>

                    <x-input-label
                        for="name"
                        :value="__('Name')"
                        class="text-gray-700 dark:text-gray-300"
                    />

                    <x-text-input
                        id="name"
                        class="block mt-2 w-full rounded-xl
                               dark:bg-gray-800
                               dark:border-gray-700
                               dark:text-white
                               focus:border-indigo-500
                               focus:ring-indigo-500"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name"
                    />

                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2"
                    />

                </div>


                <!-- Email -->

                <div class="mt-5">

                    <x-input-label
                        for="email"
                        :value="__('Email')"
                        class="text-gray-700 dark:text-gray-300"
                    />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl
                               dark:bg-gray-800
                               dark:border-gray-700
                               dark:text-white
                               focus:border-indigo-500
                               focus:ring-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>


                <!-- Mot de passe -->

                <div class="mt-5">

                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-gray-700 dark:text-gray-300"
                    />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl
                               dark:bg-gray-800
                               dark:border-gray-700
                               dark:text-white
                               focus:border-indigo-500
                               focus:ring-indigo-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                <!-- Confirmation -->

                <div class="mt-5">

                    <x-input-label
                        for="password_confirmation"
                        :value="__('Confirm Password')"
                        class="text-gray-700 dark:text-gray-300"
                    />

                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-xl
                               dark:bg-gray-800
                               dark:border-gray-700
                               dark:text-white
                               focus:border-indigo-500
                               focus:ring-indigo-500"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2"
                    />

                </div>


                <!-- Bouton -->

                <button
                    type="submit"
                    class="w-full mt-7
                           rounded-xl
                           bg-indigo-600
                           px-5 py-3
                           font-semibold text-white
                           shadow-lg shadow-indigo-500/20
                           hover:bg-indigo-700
                           focus:outline-none
                           focus:ring-2
                           focus:ring-indigo-500
                           focus:ring-offset-2
                           dark:focus:ring-offset-gray-900
                           transition"
                >
                    Créer mon compte
                </button>

            </form>


            <!-- Connexion -->

            <div class="mt-8 text-center">

                <p
                    class="text-sm
                           text-gray-500
                           dark:text-gray-400"
                >

                    Vous avez déjà un compte ?

                    <a
                        href="{{ route('login') }}"
                        class="font-semibold
                               text-indigo-600
                               dark:text-indigo-400
                               hover:underline"
                    >
                        Se connecter
                    </a>

                </p>

            </div>

        </div>

    </div>

</x-guest-layout>