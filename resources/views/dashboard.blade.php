<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden relative">

                <img src="{{ asset('images/fond-accueil.jpg') }}" alt="Fond d'accueil"
                     class="absolute inset-0 w-full h-full object-cover opacity-100">

                <div class="absolute inset-0 bg-white/60"></div>

                <div class="relative p-8 md:p-10 flex flex-col md:flex-row items-center gap-8">
                    <div class="w-24 h-24 rounded-full bg-indigo-600/20 border-4 border-indigo-100 flex items-center justify-center text-indigo-700 text-4xl font-bold shrink-0">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="text-center md:text-left flex-1">
                        <h3 class="text-3xl font-bold text-gray-900 tracking-tight mb-2">Bienvenue, {{ Auth::user()->name }}</h3>
                        <p class="text-gray-700 font-medium mb-4">Content de vous revoir. Voici le résumé de l'activité sur l'ensemble des sites.</p>

                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-4 text-sm">
                <span class="flex items-center gap-2 text-gray-700 bg-white/50 px-3 py-1.5 rounded-lg border border-gray-200">
                    {{ Auth::user()->email }}
                </span>

                            <span class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg font-semibold text-xs uppercase tracking-wide">
                    Rôle : {{ Auth::user()->role ?? 'Technicien' }}
                </span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <h3 class="text-lg font-bold text-gray-900 mb-5">Accès Rapide</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <a href="{{ route('technicien.releves') }}" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-blue-600 transition-colors">Relevés Terrain</h4>
                        <p class="text-sm text-gray-500">Consulter l'historique et rédiger de nouveaux rapports d'intervention.</p>
                    </a>

                    <a href="{{ route('technicien.sites.index') }}" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                        <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-emerald-600 transition-colors">Infrastructures</h4>
                        <p class="text-sm text-gray-500">Superviser l'état des sites d'extraction et gérer les capteurs.</p>
                    </a>

                    <a href="{{ route('technicien.dashboard') }}" class="group bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-200">
                        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-200">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <h4 class="font-bold text-gray-900 text-lg mb-1 group-hover:text-amber-600 transition-colors">Espace Technique</h4>
                        <p class="text-sm text-gray-500">Accéder à la documentation technique et aux paramètres avancés.</p>
                    </a>

                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-5">
                    <h3 class="text-lg font-bold text-gray-900">Dernières Interventions</h3>
                    <a href="{{ route('releves.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">Voir tout l'historique &rarr;</a>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="divide-y divide-gray-100">

                        @forelse ($derniersReleves as $releve)
                            <div class="p-5 hover:bg-gray-50 transition duration-150 flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 bg-gray-50 border border-gray-200 rounded-full flex items-center justify-center text-gray-400 shrink-0">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-900 text-base">
                                            {{ $releve->site->nom ?? 'Site non spécifié' }}
                                        </p>
                                        <div class="flex items-center gap-2 mt-1">
                                            <span class="text-sm text-gray-500">
                                                Relevé du {{ \Carbon\Carbon::parse($releve->date_releve)->format('d/m/Y') }}
                                            </span>
                                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                            <span class="text-sm font-medium text-gray-600">{{ ucfirst($releve->type_intervention ?? 'Routine') }}</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <span class="text-sm font-medium text-gray-700 bg-gray-100 px-3 py-1 rounded-lg">
                                        {{ $releve->profondeur }} m
                                    </span>

                                    @if($releve->anomalies)
                                        <span class="px-3 py-1 bg-red-50 text-red-700 border border-red-100 rounded-lg text-xs font-bold uppercase tracking-wide flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                            Anomalie
                                        </span>
                                    @else
                                        <span class="px-3 py-1 bg-green-50 text-green-700 border border-green-100 rounded-lg text-xs font-bold uppercase tracking-wide flex items-center gap-1.5">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                                            RAS
                                        </span>
                                    @endif
                                </div>

                            </div>
                        @empty
                            <div class="p-12 text-center flex flex-col items-center">
                                <div class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                </div>
                                <h4 class="text-base font-bold text-gray-900 mb-1">Aucune intervention récente</h4>
                                <p class="text-sm text-gray-500">
                                    Les données se synchroniseront automatiquement lors de la première saisie.
                                </p>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
