<x-app-layout>
    <div class="max-w-7xl mx-auto p-10">
        <br>
        <h1 class="text-4xl font-bold tracking-tight mb-10">
            Dashboard Administrateur
        </h1>
        <br>
        <p class="text-gray-600 text-lg mb-12">
            Bienvenue, {{ auth()->user()->name }}.
            Gérez ici l’ensemble de la plateforme Vercorium.
        </p><br>

        <div class="grid md:grid-cols-3 gap-8">

            <a href= {{ route('admin.users') }}
               class="p-8 rounded-2xl bg-white shadow-sm border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition flex flex-col">
                <h2 class="text-xl font-semibold text-gray-900 mb-3">Utilisateurs</h2>
                <p class="text-gray-600">Gérer les rôles, comptes et accès.</p>
            </a>

            <a href= {{ route('technicien.sites.index') }}
               class="p-8 rounded-2xl bg-white shadow-sm border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition flex flex-col">
            <h2 class="text-xl font-semibold text-gray-900 mb-3">Sites</h2>
            <p class="text-gray-600">Consulté la liste  des sites et des capteurs</p>
            </a>

            <a href= {{ route('technicien.releves') }}
               class="p-8 rounded-2xl bg-white shadow-sm border border-gray-200 hover:shadow-xl hover:-translate-y-1 transition flex flex-col">
            <h2 class="text-xl font-semibold text-gray-900 mb-3">Relevés</h2>
            <p class="text-gray-600">Créer et visualiser les relevés.</p>
            </a>
        </div>

    </div>
</x-app-layout>
