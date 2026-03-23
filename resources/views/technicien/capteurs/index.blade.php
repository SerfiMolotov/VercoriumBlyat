<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Capteurs du site : {{ $site->nom }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($capteurs as $capteur)
                    <div class="bg-white p-6 rounded-lg shadow border-l-4 border-indigo-500">
                        <h3 class="font-bold text-lg">{{ $capteur->nom }}</h3>
                        <p class="text-gray-500">Type : {{ $capteur->type }}</p>
                        <a href="{{ route('technicien.capteurs.show', $capteur->id) }}"
                           class="mt-4 inline-block bg-gray-800 text-white px-4 py-2 rounded text-sm">
                            Voir les relevés
                        </a>
                    </div>
                @endforeach
            </div>
            @if($capteurs->isEmpty())
                <p class="text-center text-gray-500">Aucun capteur installé sur ce site.</p>
            @endif
        </div>
    </div>
</x-app-layout>
