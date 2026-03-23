<x-app-layout>
    <div class="max-w-7xl mx-auto p-10">
        <br>
        <h1 class="text-4xl font-bold">Saisir un relevé de forage</h1>
        <br>

        <div class="bg-white p-8 rounded-xl shadow-sm mt-5">
            <form action="{{ route('technicien.releves.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="date_releve" class="block text-sm font-medium text-gray-700">Date du relevé</label>
                    <input type="date" name="date_releve" id="date_releve" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <div>
                    <label for="site_id" class="block text-sm font-medium text-gray-700">Site d'extraction</label>
                    <select name="site_id" id="site_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">-- Sélectionnez un site --</option>
                        @foreach($sites as $site)
                            <option value="{{ $site->id }}">{{ $site->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="profondeur" class="block text-sm font-medium text-gray-700">Profondeur (en mètres)</label>
                    <input type="number" step="0.01" name="profondeur" id="profondeur" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Ex: 12.5">
                </div>

                <div>
                    <label for="observations" class="block text-sm font-medium text-gray-700">Observations</label>
                    <textarea name="observations" id="observations" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Observations géologiques, problèmes rencontrés..."></textarea>
                </div>

                <div class="flex items-center">
                    <input id="anomalies" name="anomalies" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <label for="anomalies" class="ml-2 block text-sm text-gray-900">Signaler une anomalie critique</label>
                </div>

                <div>
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-semibold text-black bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enregistrer le relevé
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
