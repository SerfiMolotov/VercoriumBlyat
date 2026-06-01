<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path></svg>
                Historique du capteur : {{ $capteur->nom }}
                <span class="text-gray-500 text-sm font-normal">({{ $capteur->site->nom }})</span>
            </h2>
            <a href="{{ route('technicien.site.capteurs', $capteur->site_id) }}"
               class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors bg-indigo-50 px-4 py-2 rounded-lg">
                &larr; Retour aux capteurs
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <p class="text-sm text-gray-500 font-medium">Référence de série</p>
                    <p class="text-lg font-bold text-gray-900">{{ $capteur->ref_serie ?? 'Non spécifiée' }}</p>
                </div>

                <div class="flex flex-wrap gap-3">
                    <span class="px-3 py-1.5 bg-blue-50 text-blue-700 rounded-lg text-sm font-bold border border-blue-100 flex items-center gap-2">
                        Type : {{ ucfirst($capteur->type) }}
                    </span>

                    <span class="px-3 py-1.5 bg-purple-50 text-purple-700 rounded-lg text-sm font-bold border border-purple-100 flex items-center gap-2">
                        Unité : {{ $capteur->unite_mesure ?? 'N/A' }}
                    </span>

                    @if($capteur->est_actif)
                        <span class="px-3 py-1.5 bg-emerald-50 text-emerald-700 rounded-lg text-sm font-bold border border-emerald-100 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            En service
                        </span>
                    @else
                        <span class="px-3 py-1.5 bg-red-50 text-red-700 rounded-lg text-sm font-bold border border-red-100 flex items-center gap-1.5">
                            <span class="w-2 h-2 rounded-full bg-red-500"></span>
                            Hors service
                        </span>
                    @endif
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-100">
                <div class="p-0">

                    @if($donnees->isEmpty())
                        <div class="text-center py-16 flex flex-col items-center">
                            <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                            </div>
                            <p class="text-gray-500 font-medium">Aucune donnée n'a encore été générée pour ce capteur.</p>
                            <p class="text-sm text-gray-400 mt-1">Utilisez le bouton "Simuler" sur la page précédente pour créer des données de test.</p>
                        </div>
                    @else
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b border-gray-100 bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 font-semibold text-gray-600">Date et Heure du relevé</th>
                                <th class="px-6 py-4 font-semibold text-gray-600">Valeur enregistrée</th>
                                <th class="px-6 py-4 font-semibold text-gray-600">Statut de la donnée</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            @foreach($donnees as $data)
                                <tr class="hover:bg-slate-50 transition-colors duration-150">
                                    <td class="whitespace-nowrap px-6 py-4 text-gray-700 font-medium">
                                        {{ $data->created_at->format('d/m/Y') }}
                                        <span class="text-gray-400 ml-2">{{ $data->created_at->format('H:i:s') }}</span>
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 font-bold text-lg text-gray-900">
                                        {{ number_format($data->valeur, 2, ',', ' ') }}
                                        <span class="text-sm font-medium text-gray-500 ml-1">{{ $capteur->unite_mesure }}</span>
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                            <span class="inline-flex items-center gap-1.5 rounded-md bg-green-50 border border-green-100 px-2.5 py-1 text-xs font-bold text-green-700 uppercase tracking-wide">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                Validé
                                            </span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="p-4 border-t border-gray-100 bg-gray-50">
                            {{ $donnees->links() }}
                        </div>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
