<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Capteur;
use Illuminate\Support\Facades\Auth;
use App\Models\CapteurDonnee;
use Illuminate\Http\Request;

class TechnicienCapteurController extends Controller
{
    public function index(Site $site)
    {
        $user = Auth::user();

        if (!$user->isTechnicien() && !$user->isChefSite() && !$user->isAdmin()) {
            abort(403, 'Accès refusé : Vous n\'avez pas les droits pour consulter les capteurs de ce site.');
        }

        $capteurs = $site->capteurs()->get();
        return view('technicien.capteurs.index', compact('site', 'capteurs'));
    }

    public function show(Capteur $capteur)
    {
        $user = Auth::user();

        if (!$user->isTechnicien() && !$user->isChefSite() && !$user->isAdmin()) {
            abort(403, 'Accès refusé : Vous n\'avez pas les droits pour consulter les données détaillées de ce capteur.');
        }

        $donnees = $capteur->donnees()->orderBy('created_at', 'desc')->paginate(20);

        return view('technicien.capteurs.show', compact('capteur', 'donnees'));
    }

    public function simuler(Capteur $capteur)
    {
        $user = Auth::user();

        if (!$user->isTechnicien() && !$user->isChefSite() && !$user->isAdmin()) {
            abort(403, 'Accès refusé : Vous n\'avez pas les droits pour simuler une donnée.');
        }

        $valeur = 0;
        $type = strtolower($capteur->type);

        switch ($type) {
            case 'température':
            case 'temperature':
                $valeur = mt_rand(100, 350) / 10;
                break;
            case 'pression':
                $valeur = mt_rand(980, 1050);
                break;
            case 'niveau':
            case 'profondeur':
                $valeur = mt_rand(250, 1500) / 100;
                break;
            case 'débit':
            case 'debit':
                $valeur = mt_rand(50, 250) / 10;
                break;
            case 'humidité':
            case 'humidite':
                $valeur = mt_rand(40, 90);
                break;
            default:
                $valeur = mt_rand(0, 10000) / 100;
                break;
        }

        CapteurDonnee::create([
            'capteur_id' => $capteur->id,
            'valeur'     => $valeur,
            'created_at' => now(),
        ]);

        return back()->with('success', "Mesure simulée avec succès pour le capteur {$capteur->nom} : {$valeur} " . ($capteur->unite_mesure ?? ''));
    }

    public function create(Site $site)
    {
        $user = Auth::user();

        if (!$user->isAdmin() && !$user->isChefSite()) {
            abort(403, 'Accès refusé : Seuls les administrateurs et chefs de site peuvent ajouter un capteur.');
        }

        return view('technicien.capteurs.create', compact('site'));
    }

    public function store(Request $request, Site $site)
    {
        $user = Auth::user();

        if (!$user->isAdmin() && !$user->isChefSite()) {
            abort(403, 'Accès refusé : Seuls les administrateurs et chefs de site peuvent ajouter un capteur.');
        }

        $validated = $request->validate([
            'nom'          => 'required|string|max:255',
            'type'         => 'required|string|max:255',
            'ref_serie'    => 'nullable|string|max:255',
            'unite_mesure' => 'nullable|string|max:50',
        ]);

        $validated['site_id']   = $site->id;
        $validated['est_actif'] = $request->has('est_actif');
        $validated['statut']    = 'actif';

        Capteur::create($validated);

        return redirect()->route('technicien.site.capteurs', $site->id)
            ->with('success', 'Le nouveau capteur a été installé et configuré avec succès.');
    }
}
