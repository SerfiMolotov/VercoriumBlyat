<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight border-l-4 border-blue-600 pl-3">
            {{ __('Terminal de Supervision') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-slate-800 rounded-lg shadow-md overflow-hidden">
                <div class="p-6 sm:p-10 flex flex-col md:flex-row items-center gap-6">
                    <div class="w-20 h-20 bg-slate-700 border-2 border-slate-500 rounded-lg flex items-center justify-center text-slate-200 text-3xl font-bold shadow-inner shrink-0">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="text-white text-center md:text-left">
                        <h3 class="text-2xl font-bold mb-1 tracking-wide">Nom Opérateur : {{ Auth::user()->name }}</h3>
                        <div class="flex flex-wrap justify-center md:justify-start items-center gap-4 text-sm mt-2 text-slate-300">
                            <span class="flex items-center gap-1">✉️ {{ Auth::user()->email }}</span>
                            <span class="hidden md:inline text-slate-500">|</span>

                            <span class="px-2 py-1 bg-blue-500/20 text-blue-300 border border-blue-500/30 rounded font-mono text-xs uppercase tracking-widest">
                                Rôle Assigné : {{ Auth::user()->role ?? 'TECHNICIEN_STANDARD' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h3 class="text-sm font-bold text-slate-500 uppercase tracking-widest mb-4">Modules Opérationnels</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <a href="{{ route('technicien.releves') }}" class="group bg-white rounded-r-lg border-y border-r border-slate-200 border-l-4 border-l-blue-600 p-6 hover:shadow-md transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-bold text-slate-800 group-hover:text-blue-700 transition">Gestion des Relevés</h4>
                                <p class="text-sm text-slate-500 mt-2">Saisie et consultation des rapports de terrain.</p>
                            </div>
                            <div class="p-3 bg-blue-50 text-blue-600 rounded-md">
                                📊
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('technicien.sites.index') }}" class="group bg-white rounded-r-lg border-y border-r border-slate-200 border-l-4 border-l-emerald-500 p-6 hover:shadow-md transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-bold text-slate-800 group-hover:text-emerald-700 transition">Infrastructures</h4>
                                <p class="text-sm text-slate-500 mt-2">Supervision des sites et des capteurs installés.</p>
                            </div>
                            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-md">
                                🏭
                            </div>
                        </div>
                    </a>

                    <a href="{{ route('technicien.dashboard') }}" class="group bg-white rounded-r-lg border-y border-r border-slate-200 border-l-4 border-l-amber-500 p-6 hover:shadow-md transition">
                        <div class="flex justify-between items-start">
                            <div>
                                <h4 class="font-bold text-slate-800">Espace Technicien</h4>
                                <p class="text-sm text-slate-500 mt-2">Documentation et outils (Accès restreint).</p>
                            </div>
                            <div class="p-3 bg-amber-50 text-amber-600 rounded-md">
                                🛠️
                            </div>
                        </div>
                    </a>

                </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg shadow-sm mt-8 overflow-hidden">
                <div class="bg-slate-100 border-b border-slate-200 px-6 py-4">
                    <h3 class="font-bold text-slate-700 uppercase tracking-widest text-sm flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                        Journal des interventions
                    </h3>
                </div>

                <div class="divide-y divide-slate-100">

                    @forelse ($derniersReleves as $releve)
                        <div class="p-4 hover:bg-slate-50 transition flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                            <div class="flex items-center gap-4">
                                <div class="p-2 bg-slate-100 text-slate-600 rounded border border-slate-200">
                                    📋
                                </div>
                                <div>
                                    <p class="font-bold text-slate-800">
                                        {{ $releve->site->nom ?? 'Site inconnu' }}
                                    </p>
                                    <p class="text-xs text-slate-500 font-mono mt-1">
                                        Saisi le {{ \Carbon\Carbon::parse($releve->date_releve)->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <span class="text-sm font-mono text-slate-600 border border-slate-200 px-2 py-1 rounded bg-white shadow-sm">
                                    {{ $releve->profondeur }} m
                                </span>

                                @if($releve->anomalies)
                                    <span class="px-2 py-1 bg-red-100/50 text-red-700 border border-red-200 text-xs font-bold rounded uppercase tracking-wider">
                                        ⚠️ Anomalie
                                    </span>
                                @else
                                    <span class="px-2 py-1 bg-emerald-100/50 text-emerald-700 border border-emerald-200 text-xs font-bold rounded uppercase tracking-wider">
                                        ✓ RAS
                                    </span>
                                @endif
                            </div>

                        </div>
                    @empty
                        <div class="p-10 text-center">
                            <p class="text-slate-500 font-mono text-sm">
                                > En attente de synchronisation...<br>
                                > Aucun relevé n'a encore été enregistré dans le système.
                            </p>
                        </div>
                    @endforelse

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
