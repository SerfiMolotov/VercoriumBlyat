<x-app-layout>
    <div class="max-w-7xl mx-auto p-10">
        <br>
        <h1 class="text-4xl font-bold tracking-tight mb-10">
            Gestion des utilisateurs
        </h1>
        <br>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-300 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white shadow-sm border border-gray-200 rounded-2xl overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-gray-100 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">ID</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Nom</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Email</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Rôle</th>
                    <th class="px-6 py-4 text-sm font-semibold text-gray-700">Action</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-700">{{ $user->id }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-gray-700">{{ $user->email }}</td>

                        <td class="px-6 py-4">
                                <span class="inline-block px-3 py-1 text-sm rounded-lg
                                    @if($user->role === 'admin') bg-black text-white
                                    @else bg-gray-200 text-gray-800 @endif">
                                    {{ $user->role }}
                                </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center space-x-3">

                                <form method="POST" action="{{ route('admin.users.updateRole', $user) }}" class="flex items-center space-x-2">
                                    @csrf
                                    <select name="role" class="border border-gray-300 rounded-lg p-2 text-sm focus:ring-black focus:border-black">
                                        <option value="user" @selected($user->role === 'user')>Utilisateur</option>
                                        <option value="admin" @selected($user->role === 'admin')>Administrateur</option>
                                        <option value="technicien" @selected($user->role === 'technicien')>Technicien</option>
                                        <option value="chef_site" @selected($user->role === 'chef_site')>Chef de site</option>
                                        <option value="logistique" @selected($user->role === 'logistique')>Logistique</option>
                                        <option value="direction" @selected($user->role === 'direction')>Direction</option>
                                    </select>
                                    <button type="submit" class="px-4 py-2 bg-black text-white text-sm rounded-lg hover:bg-gray-800 transition">
                                        Modifier
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Êtes-vous certain de vouloir supprimer l\'utilisateur {{ $user->name }} ? Cette action est irréversible.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-50 text-red-600 border border-red-200 text-sm rounded-lg hover:bg-red-100 hover:text-red-700 transition">
                                        Supprimer
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
