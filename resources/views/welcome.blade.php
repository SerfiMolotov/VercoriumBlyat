<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VEM — Vercorium Extraction & Modelling</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,600,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .glass { background: rgba(255, 255, 255, 0.03); backdrop-filter: blur(12px); border: 1px solid rgba(255, 255, 255, 0.1); }
        .hero-gradient { background: radial-gradient(circle at top right, #064e3b, #020617); }
        .text-gradient { background: linear-gradient(to bottom right, #fff, #94a3b8); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    </style>
</head>
<body class="bg-[#020617] text-slate-300 font-sans antialiased selection:bg-emerald-500/30">

    <!-- Nav de Luxe -->
    <nav class="fixed w-full z-50 top-0 px-6 py-4">
        <div class="max-w-7xl mx-auto glass rounded-2xl px-6 py-3 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-emerald-500 rounded-lg flex items-center justify-center font-black text-[#020617]">V</div>
                <span class="text-white font-bold tracking-[0.2em] text-sm uppercase">Vercorium</span>
            </div>

            <div class="hidden md:flex items-center gap-8 text-xs font-bold uppercase tracking-widest">
                <a href="#expertise" class="hover:text-emerald-400 transition">Expertise</a>
                <a href="#environnement" class="hover:text-emerald-400 transition">Environnement</a>
                <a href="#logistique" class="hover:text-emerald-400 transition">Logistique</a>
            </div>

            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-xs font-bold uppercase tracking-widest border border-emerald-500/30 px-4 py-2 rounded-lg hover:bg-emerald-500/10 transition">Tableau de bord</a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-bold uppercase tracking-widest px-4 py-2 hover:text-white transition">Connexion</a>
                    <a href="{{ route('register') }}" class="text-xs font-bold uppercase tracking-widest bg-emerald-600 text-white px-5 py-2.5 rounded-xl hover:bg-emerald-500 shadow-lg shadow-emerald-900/20 transition">Accès Client</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center hero-gradient pt-20 overflow-hidden">
        <div class="absolute inset-0 opacity-20" style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>
        
        <!-- Cercles décoratifs (Brume de montagne) -->
        <div class="absolute top-1/4 -left-20 w-96 h-96 bg-emerald-900/30 rounded-full filter blur-[120px]"></div>
        <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-blue-900/20 rounded-full filter blur-[120px]"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div class="inline-block px-4 py-1.5 glass rounded-full text-emerald-400 text-[10px] font-black uppercase tracking-[0.3em] mb-8">
                Précision • Traçabilité • Innovation
            </div>
            <h1 class="text-5xl md:text-8xl font-extrabold text-gradient leading-[1.1] tracking-tight mb-8">
                L'ingénierie minérale <br> <span class="text-white">au sommet.</span>
            </h1>
            <p class="max-w-2xl mx-auto text-slate-400 text-lg md:text-xl font-light leading-relaxed mb-12">
                Expert en modélisation et extraction scientifique au cœur du massif du Vercors. Nous transformons la donnée brute en excellence opérationnelle.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="#expertise" class="group flex items-center gap-3 bg-white text-black px-8 py-4 rounded-2xl font-bold hover:bg-emerald-400 transition-all duration-300">
                    Nos Opérations
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
                <a href="#" class="text-sm font-bold uppercase tracking-widest text-slate-300 hover:text-white transition">Rapport Annuel 2026</a>
            </div>
        </div>

        <!-- Indicateur de scroll -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-3">
            <div class="w-[1px] h-12 bg-gradient-to-b from-emerald-500 to-transparent"></div>
        </div>
    </section>

    <!-- Section Expertise -->
    <section id="expertise" class="py-32 bg-[#020617]">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-16 items-start">
                <div class="md:col-span-4 sticky top-32">
                    <h2 class="text-xs font-black uppercase tracking-[0.4em] text-emerald-500 mb-6">Expertise</h2>
                    <h3 class="text-4xl font-bold text-white leading-tight mb-8">Une approche <br> scientifique rigoureuse.</h3>
                    <p class="text-slate-500 leading-relaxed mb-8">
                        Vercorium déploie des systèmes de forage de nouvelle génération couplés à une analyse géologique en temps réel.
                    </p>
                    <div class="grid grid-cols-2 gap-8">
                        <div>
                            <div class="text-3xl font-bold text-white">99.8%</div>
                            <div class="text-[10px] uppercase tracking-widest text-slate-500 mt-2">Précision Data</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-white">12</div>
                            <div class="text-[10px] uppercase tracking-widest text-slate-500 mt-2">Sites Actifs</div>
                        </div>
                    </div>
                </div>

                <div class="md:col-span-8 grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <!-- Card 1 -->
                    <div class="glass p-10 rounded-3xl hover:border-emerald-500/50 transition duration-500 group">
                        <div class="w-12 h-12 bg-emerald-500/10 rounded-xl flex items-center justify-center text-emerald-500 mb-8 group-hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M11 3a1 1 0 10-2 0M11 3H9m2 0v18m-2-18l-4 4m0 0l4 4m-4-4h18"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-4">Forage de Précision</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Technologie de carottage avancée minimisant l'impact sur la structure rocheuse du massif.
                        </p>
                    </div>
                    <!-- Card 2 -->
                    <div class="glass p-10 rounded-3xl hover:border-emerald-500/50 transition duration-500 group">
                        <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center text-blue-500 mb-8 group-hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-4">Modélisation 3D</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Visualisation complète des gisements et simulation des flux logistiques avant extraction.
                        </p>
                    </div>
                    <!-- Card 3 -->
                    <div class="glass p-10 rounded-3xl hover:border-emerald-500/50 transition duration-500 group">
                        <div class="w-12 h-12 bg-amber-500/10 rounded-xl flex items-center justify-center text-amber-500 mb-8 group-hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-4">Chaîne Logistique</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">
                            Traçabilité totale du minerai, de l'extraction jusqu'au terminal de livraison partenaire.
                        </p>
                    </div>
                    <!-- Card 4 -->
                    <div class="glass p-10 rounded-3xl border-emerald-500/30 bg-emerald-500/5 transition duration-500 group">
                        <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center text-emerald-950 mb-8">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        </div>
                        <h4 class="text-xl font-bold text-white mb-4">Sécurité & Normes</h4>
                        <p class="text-sm text-slate-400 leading-relaxed">
                            Conformité stricte aux protocoles de sécurité environnementale ISO 14001.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Environnement (Focus Vercors) -->
    <section id="environnement" class="py-32 relative overflow-hidden">
        <div class="absolute inset-0 bg-emerald-950/20"></div>
        <div class="max-w-5xl mx-auto px-6 relative z-10 text-center">
            <h2 class="text-xs font-black uppercase tracking-[0.4em] text-emerald-500 mb-8">Engagement Local</h2>
            <h3 class="text-4xl md:text-6xl font-bold text-white mb-12 italic">"Protéger le massif, <br> valoriser sa richesse."</h3>
            <div class="glass p-12 rounded-[40px] text-left">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div>
                        <p class="text-lg text-slate-300 leading-relaxed mb-6 font-light">
                            Vercorium s'engage dans une charte de transparence totale. Nos rapports environnementaux sont audités et accessibles à tous nos partenaires locaux.
                        </p>
                        <a href="#" class="inline-flex items-center text-emerald-400 font-bold uppercase tracking-widest text-xs gap-2 group">
                            Consulter les archives publiques
                            <div class="w-8 h-[1px] bg-emerald-400 group-hover:w-12 transition-all"></div>
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="aspect-square glass rounded-2xl flex flex-col items-center justify-center p-6 text-center">
                            <span class="text-2xl font-bold text-white">100%</span>
                            <span class="text-[10px] text-slate-500 uppercase mt-2">Sites Réhabilités</span>
                        </div>
                        <div class="aspect-square glass rounded-2xl flex flex-col items-center justify-center p-6 text-center">
                            <span class="text-2xl font-bold text-white">-30%</span>
                            <span class="text-[10px] text-slate-500 uppercase mt-2">Émissions CO2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Minimaliste -->
    <footer class="py-20 border-t border-white/5">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-start gap-12">
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-6 h-6 bg-emerald-500 rounded flex items-center justify-center font-black text-[#020617] text-xs">V</div>
                    <span class="text-white font-bold tracking-widest text-xs uppercase">Vercorium</span>
                </div>
                <p class="text-slate-500 text-sm max-w-xs">
                    Siège social : Grenoble, France. <br> Opérations actives sur le massif du Vercors.
                </p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-16">
                <div>
                    <h5 class="text-white font-bold text-xs uppercase tracking-widest mb-6">Plateforme</h5>
                    <ul class="text-slate-500 text-xs space-y-4 uppercase tracking-tighter">
                        <li><a href="#" class="hover:text-emerald-400 transition">Dashboard</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Sécurité</a></li>
                    </ul>
                </div>
                <div>
                    <h5 class="text-white font-bold text-xs uppercase tracking-widest mb-6">Société</h5>
                    <ul class="text-slate-500 text-xs space-y-4 uppercase tracking-tighter">
                        <li><a href="#" class="hover:text-emerald-400 transition">Missions</a></li>
                        <li><a href="#" class="hover:text-emerald-400 transition">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-20 pt-8 border-t border-white/5 flex justify-between items-center text-[10px] uppercase tracking-[0.2em] text-slate-600">
            <span>© 2026 Vercorium Extraction & Modelling</span>
            <div class="flex gap-8">
                <a href="#">Confidentialité</a>
                <a href="#">Légal</a>
            </div>
        </div>
    </footer>

</body>
</html>
