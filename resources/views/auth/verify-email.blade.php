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
                ✉️
            </div>

            <h2 class="text-4xl font-bold leading-tight">
                Encore une petite
                <span class="text-indigo-200">
                    étape.
                </span>
            </h2>

            <p class="mt-5 text-lg leading-8 text-indigo-100">
                Vérifiez votre adresse email pour sécuriser
                votre compte SmartCourse et accéder à toutes
                les fonctionnalités.
            </p>

            <div class="mt-10 space-y-4 text-indigo-100">

                <div class="flex items-center gap-3">
                    <span class="text-xl">✓</span>
                    <span>Compte sécurisé</span>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xl">✓</span>
                    <span>Accès à vos cours</span>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-xl">✓</span>
                    <span>Utilisation complète de SmartCourse</span>
                </div>

            </div>

        </div>


        <!-- ================================= -->
        <!-- Contenu -->
        <!-- ================================= -->

        <div class="p-8 sm:p-12">

            <!-- Icône -->

            <div
                class="mb-6 flex h-14 w-14
                       items-center justify-center
                       rounded-2xl
                       bg-indigo-100
                       dark:bg-indigo-950
                       text-2xl"
            >
                📧
            </div>


            <h2
                class="text-3xl font-bold
                       text-gray-900 dark:text-white"
            >
                Vérifiez votre email
            </h2>


            <p
                class="mt-4 text-sm leading-6
                       text-gray-500 dark:text-gray-400"
            >
                Merci de vous être inscrit !

                Avant de commencer, veuillez vérifier votre
                adresse email en cliquant sur le lien que nous
                venons de vous envoyer.

                Si vous n'avez pas reçu l'email, nous pouvons
                vous en envoyer un nouveau.
            </p>


            <!-- Message -->

            @if (session('status') == 'verification-link-sent')

                <div
                    class="mt-6 rounded-xl
                           border border-green-200
                           dark:border-green-900
                           bg-green-50
                           dark:bg-green-950/40
                           px-4 py-3
                           text-sm
                           text-green-700
                           dark:text-green-400"
                >
                    ✓ Un nouveau lien de vérification vient
                    d'être envoyé à votre adresse email.
                </div>

            @endif


            <!-- Actions -->

            <div
                class="mt-8 flex flex-col gap-4
                       sm:flex-row sm:items-center
                       sm:justify-between"
            >

                <!-- Renvoyer -->

                <form
                    method="POST"
                    action="{{ route('verification.send') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               rounded-xl
                               bg-indigo-600
                               px-5 py-3
                               font-semibold text-white
                               shadow-lg shadow-indigo-500/20
                               hover:bg-indigo-700
                               transition"
                    >
                        Renvoyer l'email
                    </button>

                </form>


                <!-- Déconnexion -->

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="text-sm font-medium
                               text-gray-500
                               dark:text-gray-400
                               hover:text-gray-900
                               dark:hover:text-white
                               transition"
                    >
                        Se déconnecter
                    </button>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>