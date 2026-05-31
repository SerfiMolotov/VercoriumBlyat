<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Capteur;
use Illuminate\Support\Facades\Auth;


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
}
