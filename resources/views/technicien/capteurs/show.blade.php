<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Relevés : {{ $capteur->nom }} <span class="text-gray-500 text-sm">({{ $capteur->site->nom }})</span>
            </h2>
            <a href="{{ route('technicien.site.capteurs', $capteur->site_id) }}"
               class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 underline">
                &larr; Retour aux capteurs
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if($donnees->isEmpty())
                        <div class="text-center py-10 text-gray-500">
                            Aucune donnée enregistrée pour ce capteur.
                        </div>
                    @else
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500 bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-4">Date / Heure</th>
                                <th class="px-6 py-4">Valeur</th>
                                <th class="px-6 py-4">Statut</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($donnees as $data)
                                <tr class="border-b dark:border-neutral-500 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $data->created_at->format('d/m/Y H:i:s') }}
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 font-bold text-lg">
                                        {{ $data->valeur }} <span class="text-xs font-normal text-gray-500">{{ $data->unite }}</span>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if($data->statut === 'alerte')
                                            <span class="inline-flex items-center rounded-md bg-red-100 px-2 py-1 text-xs font-medium text-red-700">
                                                ALERTE
                                            </span>
                                        @else
                                            <span class="inline-flex items-center rounded-md bg-green-100 px-2 py-1 text-xs font-medium text-green-700">
                                                Normal
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $donnees->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
