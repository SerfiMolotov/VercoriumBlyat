<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('technicien.site.capteurs', $site->id) }}" class="text-sm font-medium text-gray-500 hover:text-gray-700 transition">
                &larr; Annuler
            </a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Déployer un nouveau capteur
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                <div class="p-8 bg-gray-50 border-b border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900">Configuration du capteur</h3>
                    <p class="text-sm text-gray-500 mt-1">Site de déploiement : <span class="font-bold text-indigo-600">{{ $site->nom }}</span></p>
                </div>

                <form action="{{ route('technicien.capteurs.store', $site->id) }}" method="POST" class="p-8 space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-2 md:col-span-1">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom du capteur <span class="text-red-500">*</span></label>
                            <input type="text" name="nom" id="nom" required placeholder="Ex: Sonde Cuve A"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type de mesure <span class="text-red-500">*</span></label>
                            <select name="type" id="type" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="">Sélectionnez un type</option>
                                <option value="Température">Température</option>
                                <option value="Pression">Pression</option>
                                <option value="Niveau">Niveau / Profondeur</option>
                                <option value="Débit">Débit</option>
                                <option value="Humidité">Humidité</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="ref_serie" class="block text-sm font-medium text-gray-700">Référence de série</label>
                            <input type="text" name="ref_serie" id="ref_serie" placeholder="Ex: SN-84920-A"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="col-span-2 md:col-span-1">
                            <label for="unite_mesure" class="block text-sm font-medium text-gray-700">Unité de mesure</label>
                            <input type="text" name="unite_mesure" id="unite_mesure" placeholder="Ex: °C, hPa, m, L/s"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input id="est_actif" name="est_actif" type="checkbox" checked
                                       class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="est_actif" class="font-medium text-gray-700">Mettre en service immédiatement</label>
                                <p class="text-gray-500">Le capteur commencera à enregistrer des données dès sa création.</p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 flex justify-end">
                        <button type="submit" class="inline-flex justify-center rounded-lg border border-transparent bg-indigo-600 py-2.5 px-6 text-sm font-bold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                            Enregistrer le capteur
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
