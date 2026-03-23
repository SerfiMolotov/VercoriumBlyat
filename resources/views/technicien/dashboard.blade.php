<x-app-layout>
    <div class="max-w-7xl mx-auto p-10">
        <br>
        <h1 class="text-4xl font-bold">Espace Technicien</h1>
        <br>
        <div class="grid md:grid-cols-3 gap-8 mt-10">

            <a href="{{ route('technicien.sites.index') }}" class="block p-6 bg-white rounded-xl shadow-sm hover:shadow-lg transition">
                <h2 class="text-xl font-semibold">Sites</h2>
                <p class="text-gray-600 mt-2">Voir la liste des sites.</p>
            </a>

            <a href="{{ route('technicien.releves') }}" class="block p-6 bg-white rounded-xl shadow-sm hover:shadow-lg transition">
                <h2 class="text-xl font-semibold">Relevés</h2>
                <p class="text-gray-600 mt-2">Consultation des relevés.</p>
            </a>

            <a href="{{ route('technicien.releves.create') }}" class="block p-6 bg-white rounded-xl shadow-sm hover:shadow-lg transition">
                <h2 class="text-xl font-semibold">Créer un relevé</h2>
                <p class="text-gray-600 mt-2">Effectuer un nouveau relevé.</p>
            </a>

        </div>
    </div>
</x-app-layout>
