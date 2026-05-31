<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight border-l-4 border-blue-600 pl-3">
            {{ __('Saisie d\'un Rapport d\'Intervention') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white border border-slate-200 rounded-lg shadow-sm overflow-hidden">

                <form action="{{ route('technicien.releves.store') }}" method="POST">
                    @csrf

                    <div class="p-8 border-b border-slate-200">
                        <h3 class="text-lg font-bold text-slate-700 uppercase tracking-widest mb-6">1. Contexte & Informations</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Site d'intervention *</label>
                                <select name="site_id" required class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="" disabled selected>Sélectionnez un site...</option>
                                    @foreach($sites as $site)
                                        <option value="{{ $site->id }}">{{ $site->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Profondeur mesurée (m) *</label>
                                <input type="number" step="0.01" name="profondeur" required class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ex: 145.50">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Type d'intervention *</label>
                                <select name="type_intervention" required class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="routine">Contrôle de routine</option>
                                    <option value="depannage">Dépannage</option>
                                    <option value="installation">Installation</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Conditions Météo</label>
                                <select name="meteo" class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Non spécifié</option>
                                    <option value="ensoleille">Ensoleillé</option>
                                    <option value="pluie">Pluie</option>
                                    <option value="neige">Neige</option>
                                    <option value="vent_fort">Vent fort</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Durée sur place (en minutes)</label>
                                <input type="number" name="duree_intervention" class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ex: 45">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Date du relevé *</label>
                                <input type="date" name="date_releve" required class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                    </div>

                    <div class="p-8 border-b border-slate-200 bg-slate-50">
                        <h3 class="text-lg font-bold text-slate-700 uppercase tracking-widest mb-6">2. Bilan Opérationnel</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Statut de la production *</label>
                                    <select name="statut_production" required class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="normale">Production Normale</option>
                                        <option value="degrade">Mode Dégradé</option>
                                        <option value="arret">À l'arrêt</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">État général de la structure *</label>
                                    <select name="etat_structure" required class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                        <option value="bon">Bon (RAS)</option>
                                        <option value="degrade">Dégradé (À surveiller)</option>
                                        <option value="critique">Critique (Intervention requise)</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-slate-700 mb-1">Niveau des cuves / stock (%)</label>
                                    <input type="number" name="niveau_stockage_general" min="0" max="100" class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Ex: 85">
                                </div>
                            </div>

                            <div class="space-y-4 bg-white p-6 rounded-md border border-slate-200">
                                <label class="flex items-center gap-3">
                                    <input type="checkbox" name="perimetre_securise" value="1" checked class="w-5 h-5 text-blue-600 rounded border-slate-300 focus:ring-blue-500">
                                    <span class="text-slate-700">Le périmètre du site est sécurisé (Clôtures intactes)</span>
                                </label>

                                <label class="flex items-center gap-3">
                                    <input type="checkbox" name="fuites_visibles" value="1" class="w-5 h-5 text-red-600 rounded border-slate-300 focus:ring-red-500">
                                    <span class="text-slate-700 font-bold text-red-600">Présence de fuites visibles (Eau/Huile)</span>
                                </label>

                                <label class="flex items-center gap-3">
                                    <input type="checkbox" name="anomalies" value="1" class="w-5 h-5 text-red-600 rounded border-slate-300 focus:ring-red-500">
                                    <span class="text-slate-700 font-bold text-red-600">Déclarer une ANOMALIE GLOBALE sur ce site</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="p-8">
                        <h3 class="text-lg font-bold text-slate-700 uppercase tracking-widest mb-6">3. Conclusion</h3>

                        <div class="mb-6">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Observations terrain</label>
                            <textarea name="observations" rows="4" class="w-full border-slate-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Détaillez ici tout événement notable..."></textarea>
                        </div>

                        <div class="mb-8 border-l-4 border-amber-500 bg-amber-50 p-4">
                            <label class="flex items-center gap-3">
                                <input type="checkbox" name="signature_technicien" value="1" required class="w-6 h-6 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                                <span class="text-slate-800 font-bold">Je certifie avoir effectué ces contrôles moi-même et valide ce rapport. *</span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-4">
                            <a href="{{ route('technicien.releves') }}" class="px-6 py-3 border border-slate-300 text-slate-700 font-bold rounded-md hover:bg-slate-50 transition">
                                Annuler
                            </a>
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-bold rounded-md hover:bg-blue-700 transition shadow-md">
                                Sauvegarder le Rapport
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
