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
                🎓
            </div>

            <h2 class="text-4xl font-bold leading-tight">
                Apprenez plus
                <span class="text-indigo-200">
                    intelligemment.
                </span>
            </h2>

            <p class="mt-5 text-lg leading-8 text-indigo-100">
                Centralisez vos cours, générez des résumés
                intelligents et révisez efficacement grâce
                à l'intelligence artificielle.
            </p>

            <!-- Fonctionnalités -->

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
                            Vos cours au même endroit
                        </p>

                        <p class="text-sm text-indigo-200">
                            Importez vos documents facilement.
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
                            Résumés avec l'IA
                        </p>

                        <p class="text-sm text-indigo-200">
                            Comprenez rapidement l'essentiel.
                        </p>
                    </div>
                </div>


                <div class="flex items-center gap-4">
                    <div
                        class="flex h-10 w-10 items-center justify-center
                               rounded-xl bg-white/10"
                    >
                        📝
                    </div>

                    <div>
                        <p class="font-semibold">
                            Quiz intelligents
                        </p>

                        <p class="text-sm text-indigo-200">
                            Testez vos connaissances.
                        </p>
                    </div>
                </div>

            </div>

        </div>


        <!-- ========================================= -->
        <!-- Formulaire de connexion -->
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
                    👋
                </div>

                <h2
                    class="text-3xl font-bold
                           text-gray-900 dark:text-white"
                >
                    Bienvenue !
                </h2>

                <p
                    class="mt-2 text-gray-500 dark:text-gray-400"
                >
                    Connectez-vous à votre espace SmartCourse.
                </p>

            </div>


            <!-- Session Status -->

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />


            <!-- Formulaire -->

            <form
                method="POST"
                action="{{ route('login') }}"
            >

                @csrf


                <!-- Email -->

                <div>

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
                        autofocus
                        autocomplete="username"
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2"
                    />

                </div>


                <!-- Mot de passe -->

                <div class="mt-5">

                    <div class="flex items-center justify-between">

                        <x-input-label
                            for="password"
                            :value="__('Password')"
                            class="text-gray-700 dark:text-gray-300"
                        />

                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-sm
                                       text-indigo-600
                                       dark:text-indigo-400
                                       hover:underline"
                            >
                                Mot de passe oublié ?
                            </a>

                        @endif

                    </div>


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
                        autocomplete="current-password"
                    />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2"
                    />

                </div>


                <!-- Se souvenir de moi -->

                <div class="mt-5">

                    <label
                        for="remember_me"
                        class="inline-flex items-center"
                    >

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded
                                   border-gray-300
                                   text-indigo-600
                                   shadow-sm
                                   focus:ring-indigo-500"
                        >

                        <span
                            class="ms-2 text-sm
                                   text-gray-600
                                   dark:text-gray-400"
                        >
                            Se souvenir de moi
                        </span>

                    </label>

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
                    Se connecter
                </button>

            </form>


            <!-- Inscription -->

            <div class="mt-8 text-center">

                <p
                    class="text-sm
                           text-gray-500
                           dark:text-gray-400"
                >

                    Vous n'avez pas encore de compte ?

                    <a
                        href="{{ route('register') }}"
                        class="font-semibold
                               text-indigo-600
                               dark:text-indigo-400
                               hover:underline"
                    >
                        Créer un compte
                    </a>

                </p>

            </div>

        </div>

    </div>

</x-guest-layout>