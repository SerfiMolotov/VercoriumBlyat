<!DOCTYPE html>
<html lang="fr" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VEM - Vercorium Extraction & Modelling</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/photo-logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Montserrat', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased selection:bg-indigo-500 selection:text-white">

<nav class="absolute top-0 w-full z-50 transition-all duration-300 bg-gradient-to-b from-black/80 to-transparent">
    <div class="max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">

        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('images/photo-logo.png') }}" alt="VEM Logo" class="h-12 w-auto brightness-0 invert group-hover:scale-105 transition-transform duration-300">
            <span class="font-black text-2xl tracking-tighter text-white">V.E.M.</span>
        </a>

        <div class="hidden md:flex items-center gap-8 font-semibold text-sm tracking-wide text-white/90">
            <a href="#mission" class="hover:text-white transition-colors">Notre Mission</a>
            <a href="#expertises" class="hover:text-white transition-colors">Expertises</a>
            <a href="#technologie" class="hover:text-white transition-colors">Technologie</a>
            <a href="#actus" class="hover:text-white transition-colors">Actualités</a>

            <div class="w-px h-5 bg-white/20 mx-2"></div>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white px-5 py-2.5 rounded-lg font-bold transition-all shadow-lg hover:shadow-indigo-500/30">
                        Mon Espace
                    </a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-white transition-colors">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white px-5 py-2.5 rounded-lg font-bold transition-all">
                        Créer un compte
                    </a>
                @endauth
            @endif
        </div>
    </div>
</nav>

<header class="relative w-full h-screen min-h-[600px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/photo-vercors.jpg') }}');"></div>

    <div class="absolute inset-0 bg-slate-900/60 mix-blend-multiply"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>

    <div class="relative z-10 text-center px-4 max-w-4xl mx-auto mt-16">
        <span class="text-indigo-400 font-bold tracking-widest uppercase text-sm mb-4 block">Portail d'entreprise V.E.M.</span>
        <h1 class="text-white font-black text-5xl md:text-7xl tracking-tight mb-6 leading-tight drop-shadow-xl">
            L'innovation géologique <br/> <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-emerald-400">au cœur du Vercors.</span>
        </h1>
        <p class="text-slate-200 text-lg md:text-xl font-medium mb-10 max-w-2xl mx-auto drop-shadow-md leading-relaxed">
            Allier extraction responsable, logistique de pointe et modélisation scientifique grâce à un écosystème numérique centralisé et performant.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#mission" class="bg-white text-slate-900 px-8 py-3.5 rounded-lg font-bold hover:bg-slate-100 transition-colors shadow-lg">
                Découvrir le projet
            </a>
            @guest
                <a href="{{ route('login') }}" class="bg-indigo-600/20 backdrop-blur-md border border-indigo-500/30 text-white px-8 py-3.5 rounded-lg font-bold hover:bg-indigo-600/40 transition-colors">
                    Accès Collaborateurs
                </a>
            @endguest
        </div>
    </div>
</header>

<section id="mission" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div class="space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-bold uppercase tracking-wide">
                    <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                    Notre Vision
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">Structurer l'artisanat pour bâtir l'industrie de demain.</h2>
                <p class="text-slate-600 text-lg leading-relaxed">
                    Historiquement reconnue pour son savoir-faire artisanal, <strong>Vercorium Extraction & Modelling (VEM)</strong> franchit aujourd'hui un cap majeur. Nous avons repensé notre organisation pour centraliser l'information entre nos équipes de direction, nos chercheurs scientifiques et nos techniciens sur le terrain.
                </p>
                <p class="text-slate-600 text-lg leading-relaxed">
                    Notre objectif est double : garantir la sécurité et l'efficacité de nos extractions, tout en fournissant des données environnementales de haute précision à nos partenaires institutionnels et universitaires.
                </p>

                <div class="pt-4 flex gap-8 border-t border-slate-100">
                    <div>
                        <p class="text-3xl font-black text-indigo-600">3+</p>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wide">Sites d'extraction</p>
                    </div>
                    <div>
                        <p class="text-3xl font-black text-emerald-600">50+</p>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wide">Capteurs IoT actifs</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500 to-emerald-400 rounded-3xl transform translate-x-4 translate-y-4 opacity-20"></div>
                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Laboratoire VEM" class="relative rounded-3xl shadow-xl w-full h-[500px] object-cover">
            </div>
        </div>
    </div>
</section>

<section id="expertises" class="py-24 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight mb-4">Nos Pôles d'Expertise</h2>
            <p class="text-slate-600 text-lg">Une synergie parfaite entre l'action sur le terrain, la gestion des ressources et l'analyse scientifique des données.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Extraction & Infrastructures</h3>
                <p class="text-slate-600 leading-relaxed mb-6">Gestion quotidienne des sites d'extraction. Nos techniciens réalisent des relevés réguliers pour assurer la maintenance préventive et garantir l'intégrité des structures.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Logistique Matérielle</h3>
                <p class="text-slate-600 leading-relaxed mb-6">Suivi rigoureux des stocks et des mouvements d'équipements. Nous assurons la traçabilité complète de nos outils entre le magasin central et les sites distants.</p>
            </div>

            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition-all duration-300 group">
                <div class="w-14 h-14 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Recherche & Modélisation</h3>
                <p class="text-slate-600 leading-relaxed mb-6">Traitement des données issues de nos capteurs IoT. Nos chercheurs modélisent l'environnement pour prévenir les risques géologiques et partager ces données (ex: UGA).</p>
            </div>
        </div>
    </div>
</section>

<section id="technologie" class="py-24 bg-slate-900 overflow-hidden relative">
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-72 h-72 rounded-full bg-indigo-500 opacity-10 blur-3xl"></div>
    <div class="absolute bottom-0 left-10 -mb-20 w-56 h-56 rounded-full bg-emerald-500 opacity-10 blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div class="relative order-2 lg:order-1">
                <div class="bg-slate-800 rounded-2xl p-2 shadow-2xl border border-slate-700">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Interface VercorHub" class="rounded-xl opacity-80">
                </div>
            </div>

            <div class="space-y-6 order-1 lg:order-2">
                <h2 class="text-3xl md:text-4xl font-black text-white tracking-tight">Un écosystème connecté, partout.</h2>
                <p class="text-slate-400 text-lg leading-relaxed">
                    Pour répondre aux exigences du terrain, le système d'information de VEM ne s'arrête pas à la gestion administrative. Nous avons développé une architecture moderne basée sur une <strong>API REST sécurisée</strong>.
                </p>
                <ul class="space-y-4 mt-8">
                    <li class="flex items-center gap-4 text-slate-300">
                        <div class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-indigo-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span><strong>Plateforme VercorHub</strong> : Front-office Angular ultra-rapide pour nos techniciens.</span>
                    </li>
                    <li class="flex items-center gap-4 text-slate-300">
                        <div class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center text-orange-400 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <span><strong>Data Temps Réel</strong> : API communicant directement avec nos capteurs IoT.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section id="actus" class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-end justify-between mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-black text-slate-900 tracking-tight">Actualités VEM</h2>
                <p class="text-slate-500 mt-2">Restez informés des dernières avancées sur le massif.</p>
            </div>
            <a href="#" class="hidden md:block text-indigo-600 font-bold hover:text-indigo-800">Voir tout &rarr;</a>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <a href="#" class="group flex flex-col bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Montagne" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-slate-800">Technologie</div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-xl text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">Déploiement des nouveaux capteurs IoT</h3>
                    <p class="text-slate-600 text-sm mb-6 flex-1 line-clamp-3">Le territoire du Vercors affirme son ambition avec l'installation de 50 nouveaux capteurs sur la zone d'extraction nord, permettant un suivi en temps réel...</p>
                    <span class="text-indigo-600 font-bold text-sm flex items-center gap-1">Lire l'article <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </div>
            </a>

            <a href="#" class="group flex flex-col bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Forêt" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-slate-800">Environnement</div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-xl text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">Rapport écologique annuel disponible</h3>
                    <p class="text-slate-600 text-sm mb-6 flex-1 line-clamp-3">Notre engagement pour la réhabilitation des sites miniers porte ses fruits. Découvrez notre bilan annuel sur la réintroduction de la flore endémique du massif.</p>
                    <span class="text-indigo-600 font-bold text-sm flex items-center gap-1">Lire l'article <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </div>
            </a>

            <a href="#" class="group flex flex-col bg-slate-50 rounded-2xl overflow-hidden border border-slate-100 hover:shadow-xl transition-all duration-300">
                <div class="relative h-48 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Equipe" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-full text-xs font-bold text-slate-800">Partenariat</div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="font-bold text-xl text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">Partenariat scientifique avec l'UGA</h3>
                    <p class="text-slate-600 text-sm mb-6 flex-1 line-clamp-3">Une fierté pour VEM : nos ingénieurs s'associent aux chercheurs de l'Université de Grenoble Alpes pour affiner nos modèles de prédiction géologique.</p>
                    <span class="text-indigo-600 font-bold text-sm flex items-center gap-1">Lire l'article <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg></span>
                </div>
            </a>
        </div>
    </div>
</section>

<footer class="bg-slate-950 text-slate-300 py-12 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-6">
        <div class="flex items-center gap-3 opacity-50 hover:opacity-100 transition-opacity">
            <img src="{{ asset('images/photo-logo.png') }}" alt="VEM" class="h-8 w-auto brightness-0 invert">
            <span class="font-black text-xl tracking-widest text-white">V.E.M.</span>
        </div>

        <p class="text-sm font-medium">Vercorium Extraction & Modelling © {{ date('Y') }}. Tous droits réservés.</p>

        <div class="flex gap-6 text-sm">
            <a href="#" class="hover:text-white transition-colors">Mentions légales</a>
            <a href="#" class="hover:text-white transition-colors">Politique de confidentialité</a>
        </div>
    </div>
</footer>

</body>
</html>
