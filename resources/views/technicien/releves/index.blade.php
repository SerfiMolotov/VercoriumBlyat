<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                {{ __('Historique des Interventions') }}
            </h2>
            <a href="{{ route('technicien.releves.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-5 rounded-md shadow-sm transition duration-150 ease-in-out">
                Nouveau Rapport
            </a>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-md shadow-sm">
                    <p class="text-green-700 font-medium">{{ session('success') }}</p>
                </div>
            @endif

            <div class="space-y-6">
                @forelse($releves as $releve)
                    <div class="bg-white border {{ $releve->anomalies ? 'border-red-300 shadow-sm' : 'border-gray-200 shadow-sm' }} rounded-xl overflow-hidden transition hover:shadow-md">

                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-gray-50/50 border-b border-gray-100 px-6 py-4">
                            <div>
                                <h3 class="text-lg font-bold text-gray-900">{{ $releve->site->nom ?? 'Site non spécifié' }}</h3>
                                <p class="text-sm text-gray-500 font-medium mt-1">
                                    Date du relevé : {{ \Carbon\Carbon::parse($releve->date_releve)->format('d/m/Y') }}
                                </p>
                            </div>

                            <div class="mt-3 sm:mt-0 flex items-center gap-2">
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold uppercase tracking-wide rounded-full">
                                    {{ ucfirst($releve->type_intervention ?? 'Routine') }}
                                </span>

                                @if($releve->anomalies)
                                    <span class="px-3 py-1 bg-red-100 text-red-700 text-xs font-semibold uppercase tracking-wide rounded-full flex items-center gap-1">
                                        Anomalie Déclarée
                                    </span>
                                @endif

                                @if(Auth::user()->isAdmin())
                                    <form action="{{ route('technicien.releves.destroy', $releve) }}" method="POST" onsubmit="return confirm('Êtes-vous certain de vouloir archiver et supprimer définitivement ce rapport d\'intervention ?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-50 hover:bg-red-100 text-red-700 text-xs font-semibold uppercase tracking-wide rounded-full transition duration-150">
                                            Supprimer
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>

                        <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Mesures & Production</h4>
                                <ul class="space-y-3 text-sm">
                                    <li class="flex justify-between border-b border-gray-50 pb-1">
                                        <span class="text-gray-500">Profondeur</span>
                                        <span class="font-semibold text-gray-900">{{ $releve->profondeur }} m</span>
                                    </li>
                                    <li class="flex justify-between border-b border-gray-50 pb-1">
                                        <span class="text-gray-500">Stockage</span>
                                        <span class="font-semibold text-gray-900">{{ $releve->niveau_stockage_general ?? '--' }} %</span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-500">Production</span>
                                        <span class="font-semibold {{ $releve->statut_production === 'arret' ? 'text-red-600' : 'text-gray-900' }}">
                                            {{ ucfirst($releve->statut_production ?? 'Inconnu') }}
                                        </span>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Environnement</h4>
                                <ul class="space-y-3 text-sm">
                                    <li class="flex justify-between border-b border-gray-50 pb-1">
                                        <span class="text-gray-500">Météo</span>
                                        <span class="font-semibold text-gray-900">{{ str_replace('_', ' ', ucfirst($releve->meteo ?? 'Non renseigné')) }}</span>
                                    </li>
                                    <li class="flex justify-between border-b border-gray-50 pb-1">
                                        <span class="text-gray-500">Structure</span>
                                        <span class="font-semibold {{ $releve->etat_structure === 'critique' ? 'text-red-600' : 'text-gray-900' }}">
                                            {{ ucfirst($releve->etat_structure ?? 'Bon') }}
                                        </span>
                                    </li>
                                    <li class="flex justify-between">
                                        <span class="text-gray-500">Durée sur site</span>
                                        <span class="font-semibold text-gray-900">{{ $releve->duree_intervention ? $releve->duree_intervention . ' min' : '--' }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Contrôles Sécurité</h4>
                                <ul class="space-y-3 text-sm">
                                    <li class="flex justify-between items-center border-b border-gray-50 pb-1">
                                        <span class="text-gray-500">Périmètre</span>
                                        @if($releve->perimetre_securise)
                                            <span class="text-green-700 font-medium bg-green-50 px-2 py-0.5 rounded text-xs">Sécurisé</span>
                                        @else
                                            <span class="text-red-700 font-medium bg-red-50 px-2 py-0.5 rounded text-xs">Compromis</span>
                                        @endif
                                    </li>
                                    <li class="flex justify-between items-center border-b border-gray-50 pb-1">
                                        <span class="text-gray-500">Fuites</span>
                                        @if($releve->fuites_visibles)
                                            <span class="text-red-700 font-medium bg-red-50 px-2 py-0.5 rounded text-xs">Détectées</span>
                                        @else
                                            <span class="text-green-700 font-medium bg-green-50 px-2 py-0.5 rounded text-xs">Aucune</span>
                                        @endif
                                    </li>
                                    <li class="flex justify-between items-center">
                                        <span class="text-gray-500">Photo jointe</span>
                                        <span class="font-medium text-gray-900">{{ $releve->photo_url ? 'Oui' : 'Non' }}</span>
                                    </li>
                                </ul>
                            </div>

                            <div class="lg:col-span-1">
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Observations</h4>
                                <div class="bg-gray-50 rounded-md p-3 h-full min-h-[80px]">
                                    @if($releve->observations)
                                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $releve->observations }}</p>
                                    @else
                                        <p class="text-sm text-gray-400 italic">Aucune observation supplémentaire n'a été saisie.</p>
                                    @endif
                                </div>
                            </div>

                        </div>

                        <div class="bg-gray-50 border-t border-gray-100 px-6 py-3 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500">
                            <div>
                                Saisi par <span class="font-semibold text-gray-700">{{ $releve->user->name ?? 'Technicien inconnu' }}</span>
                            </div>
                            <div class="mt-2 sm:mt-0 flex items-center gap-1">
                                @if($releve->signature_technicien)
                                    <span class="text-green-700 font-medium">Rapport signé et certifié</span>
                                @else
                                    <span class="text-gray-400">Rapport non signé</span>
                                @endif
                            </div>
                        </div>

                    </div>
                @empty
                    <div class="bg-white border border-gray-200 rounded-xl p-12 text-center shadow-sm">
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun rapport</h3>
                        <p class="mt-1 text-sm text-gray-500">Il n'y a actuellement aucun rapport d'intervention.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $releves->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
