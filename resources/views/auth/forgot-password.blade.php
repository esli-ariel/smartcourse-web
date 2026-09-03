<x-guest-layout>

    <div class="grid lg:grid-cols-2">

        <!-- ================================= -->
        <!-- Partie gauche -->
        <!-- ================================= -->

        <div
            class="hidden lg:flex flex-col justify-center
                   bg-gradient-to-br
                   from-indigo-600 to-purple-700
                   p-12 text-white"
        >

            <div class="mb-8 text-6xl">
                🔐
            </div>

            <h2 class="text-4xl font-bold leading-tight">
                Pas de panique,
                <span class="text-indigo-200">
                    ça arrive.
                </span>
            </h2>

            <p class="mt-5 text-lg leading-8 text-indigo-100">
                Entrez votre adresse email et nous vous enverrons
                un lien pour créer un nouveau mot de passe.
            </p>

            <div class="mt-10 space-y-4 text-indigo-100">

                <div class="flex items-center gap-3">
                    <span class="text-xl">✓</span>
                    <span>Simple et rapide</span>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xl">✓</span>
                    <span>Lien sécurisé par email</span>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xl">✓</span>
                    <span>Retrouvez rapidement votre compte</span>
                </div>

            </div>

        </div>


        <!-- ================================= -->
        <!-- Formulaire -->
        <!-- ================================= -->

        <div class="p-8 sm:p-12">

            <div class="mb-8">

                <div
                    class="mb-4 flex h-12 w-12
                           items-center justify-center
                           rounded-2xl
                           bg-indigo-100
                           dark:bg-indigo-950
                           text-2xl"
                >
                    🔑
                </div>

                <h2
                    class="text-3xl font-bold
                           text-gray-900 dark:text-white"
                >
                    Mot de passe oublié ?
                </h2>

                <p
                    class="mt-3 text-sm leading-6
                           text-gray-500 dark:text-gray-400"
                >
                    Aucun problème. Entrez votre adresse email
                    et nous vous enverrons un lien sécurisé
                    pour réinitialiser votre mot de passe.
                </p>

            </div>


            <!-- Session Status -->

            <x-auth-session-status
                class="mb-4"
                :status="session('status')"
            />


            <form
                method="POST"
                action="{{ route('password.email') }}"
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
                        class="block mt-2 w-full
                               rounded-xl
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
                    />

                    <x-input-error
                        :messages="$errors->get('email')"
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
                    Envoyer le lien de réinitialisation
                </button>

            </form>


            <!-- Retour -->

            <div class="mt-8 text-center">

                <a
                    href="{{ route('login') }}"
                    class="text-sm font-semibold
                           text-indigo-600
                           dark:text-indigo-400
                           hover:underline"
                >
                    ← Retour à la connexion
                </a>

            </div>

        </div>

    </div>

</x-guest-layout>