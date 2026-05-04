<x-app-layout>
    <div class="max-w-7xl mx-auto p-10">
        <br>
        <h1 class="text-4xl font-bold tracking-tight mb-10">
            Vos sites d’intervention
        </h1>
        <br>
        <p class="text-gray-600 text-lg mb-10">
            Consultez la liste complète des sites où vous pouvez effectuer des relevés et superviser les capteurs.
        </p>
        <br>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($sites as $site)
                <div class="p-8 bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-lg
                            hover:-translate-y-1 transition flex flex-col">

                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                        {{ $site->nom }}
                    </h2>

                    <p class="text-gray-600 mb-2">
                        <strong class="text-gray-700">Adresse :</strong> {{ $site->adresse }}
                    </p>

                    <p class="text-gray-600 mb-2">
                        <strong class="text-gray-700">Type :</strong> {{ $site->type }}
                    </p>

                    <p class="text-gray-600 mb-2">
                        <strong class="text-gray-700">Ville :</strong> {{ $site->ville }}
                    </p>

                    <p class="text-gray-600 mb-2">
                        <strong class="text-gray-700">Code Postal :</strong> {{ $site->code_postal }}
                    </p>

                    <p class="text-gray-600 mb-4">
                        <strong class="text-gray-700">Description :</strong> {{ $site->description }}
                    </p>

                    <a href="{{ route('technicien.site.capteurs', $site->id) }}"
                       class="mt-auto inline-block px-5 py-3 text-center bg-black text-white rounded-lg
                              hover:bg-gray-800 transition">
                        Voir les capteurs
                    </a>

                </div>
            @endforeach

        </div>

        @if($sites->isEmpty())
            <div class="mt-20 text-center text-gray-500 text-lg">
                Aucun site n’a encore été enregistré.
            </div>
        @endif

    </div>
</x-app-layout>
