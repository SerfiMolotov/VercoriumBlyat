<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vercorium Extraction & Modelling - VEM</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

<nav class="absolute top-0 w-full z-50 text-white">
    <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">

        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <img src="{{ asset('images/photo-logo.png') }}" alt="VEM" class="h-12 w-auto brightness-0 invert">
            <span class="font-black text-2xl tracking-tighter">V.E.M.</span>
        </a>

        <div class="hidden md:flex gap-8 font-bold text-sm tracking-widest uppercase">
            <a href="#projet" class="hover:text-gray-300 transition">Le Projet</a>
            <a href="#actus" class="hover:text-gray-300 transition">Actualités</a>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="hover:text-gray-300 transition">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-gray-300 transition">Connexion</a>
                    <a href="{{ route('register') }}" class="hover:text-gray-300 transition bg-gray-500 rounded ">Créer un compte</a>
                @endauth
            @endif
        </div>
    </div>
</nav>

<header class="relative w-full h-[85vh] bg-cover bg-center flex items-center justify-center"
        style="background-image: url('{{ asset('images/photo-vercors.jpg') }}');">

    <div class="absolute inset-0 bg-black/40"></div>

    <div class="relative z-10 text-center px-4">
        <h1 class="text-white font-black text-5xl md:text-7xl tracking-tight mb-4 drop-shadow-lg">
            Vercorium Extraction<br>& Modelling
        </h1>
        <p class="text-white text-xl md:text-2xl font-semibold drop-shadow-md">
            L'industrie responsable au cœur des Alpes.
        </p>
    </div>
</header>

<div id="projet" class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 md:-mt-54">
    <div class="grid md:grid-cols-3 gap-6">

        <div class="h-80 md:h-96 rounded-t-xl rounded-b-md overflow-hidden relative shadow-2xl border-b-8 border-green-700 bg-cover bg-center group"
             style="background-image: url('https://images.unsplash.com/photo-1448375240586-882707db888b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent transition-opacity group-hover:opacity-90"></div>
            <div class="absolute bottom-0 w-full p-6 text-center">
                <h3 class="text-white font-black text-xl tracking-widest uppercase">Extraction Éthique</h3>
            </div>
        </div>

        <div class="h-80 md:h-96 rounded-t-xl rounded-b-md overflow-hidden relative shadow-2xl border-b-8 border-blue-500 bg-cover bg-center group"
             style="background-image: url('https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent transition-opacity group-hover:opacity-90"></div>
            <div class="absolute bottom-0 w-full p-6 text-center">
                <h3 class="text-white font-black text-xl tracking-widest uppercase">Technologie & IoT</h3>
            </div>
        </div>

        <div class="h-80 md:h-96 rounded-t-xl rounded-b-md overflow-hidden relative shadow-2xl border-b-8 border-orange-600 bg-cover bg-center group"
             style="background-image: url('https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');">
            <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent transition-opacity group-hover:opacity-90"></div>
            <div class="absolute bottom-0 w-full p-6 text-center">
                <h3 class="text-white font-black text-xl tracking-widest uppercase">Modélisation 3D</h3>
            </div>
        </div>

    </div>
</div>

<section id="actus" class="bg-[#5ea3a3] py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-black text-white mb-12">Les actualités VEM</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col">
                <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Montagne" class="h-48 w-full object-cover">
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-bold text-lg mb-3 uppercase tracking-wide">Déploiement des nouveaux capteurs sismiques</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-1">Le territoire du Vercors affirme son ambition avec l'installation de 50 nouveaux capteurs sur la zone d'extraction nord, permettant un suivi en temps réel des vibrations...</p>
                    <a href="#" class="text-black font-bold text-sm hover:underline">Lire plus ...</a>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Forêt" class="h-48 w-full object-cover">
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-bold text-lg mb-3 uppercase tracking-wide">Rapport écologique annuel disponible</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-1">Notre engagement pour la réhabilitation des sites miniers porte ses fruits. Découvrez notre bilan annuel sur la réintroduction de la flore endémique du massif.</p>
                    <a href="#" class="text-black font-bold text-sm hover:underline">Lire plus ...</a>
                </div>
            </div>

            <div class="bg-white rounded-lg overflow-hidden shadow-lg flex flex-col">
                <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Equipe" class="h-48 w-full object-cover">
                <div class="p-6 flex-1 flex flex-col">
                    <h3 class="font-bold text-lg mb-3 uppercase tracking-wide">Partenariat scientifique avec Grenoble Alpes</h3>
                    <p class="text-gray-600 text-sm mb-6 flex-1">Une fierté pour VEM : nos ingénieurs s'associent aux chercheurs de l'Université de Grenoble pour affiner nos modèles de prédiction géologique.</p>
                    <a href="#" class="text-black font-bold text-sm hover:underline">Lire plus ...</a>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="bg-gray-900 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 text-center">
        <h2 class="font-black text-2xl tracking-widest mb-4">V.E.M.</h2>
        <p class="text-gray-400 text-sm">Vercorium Extraction & Modelling © {{ date('Y') }}</p>
    </div>
</footer>

</body>
</html>
