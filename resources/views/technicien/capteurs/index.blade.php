<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="flex items-center gap-4">
                <a href="{{ route('technicien.sites.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 transition">
                    &larr; Retour
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Capteurs du site : {{ $site->nom }}
                </h2>
            </div>

            @if(Auth::user()->isAdmin() || Auth::user()->isChefSite())
                <a href="{{ route('technicien.capteurs.create', $site->id) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-800 focus:bg-gray-800 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Nouveau Capteur
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-4 rounded-xl flex items-center gap-3 shadow-sm animate-fade-in">
                    <svg class="w-6 h-6 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="font-medium text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($capteurs as $capteur)
                    <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-md border border-gray-100 border-l-4 border-l-indigo-500 transition-shadow">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="font-bold text-lg text-gray-900">{{ $capteur->nom }}</h3>
                                <p class="text-sm text-gray-500 mt-1 font-medium bg-gray-100 px-2 py-0.5 rounded-md inline-block">
                                    Type : {{ $capteur->type }}
                                </p>
                            </div>
                        </div>

                        <div class="mt-6 flex flex-wrap items-center gap-3">
                            <a href="{{ route('technicien.capteurs.show', $capteur->id) }}"
                               class="inline-block bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition">
                                Historique
                            </a>

                            <form action="{{ route('technicien.capteurs.simuler', $capteur->id) }}" method="POST" class="inline-block">
                                @csrf
                                <button type="submit"
                                        class="flex items-center gap-1.5 bg-indigo-50 text-indigo-700 hover:bg-indigo-600 hover:text-white px-3 py-2 rounded-lg text-sm font-semibold transition-colors duration-200 border border-indigo-100 hover:border-transparent">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                    Simuler
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($capteurs->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl border border-gray-200 border-dashed">
                    <p class="text-gray-500">Aucun capteur installé sur ce site pour le moment.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
