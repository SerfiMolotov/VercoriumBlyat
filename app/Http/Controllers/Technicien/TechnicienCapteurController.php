<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Capteur;

class TechnicienCapteurController extends Controller
{
    public function index(Site $site)
    {
        $capteurs = $site->capteurs()->get();
        return view('technicien.capteurs.index', compact('site', 'capteurs'));
    }

    public function show(Capteur $capteur)
    {
        $donnees = $capteur->donnees()->orderBy('created_at', 'desc')->paginate(20);

        return view('technicien.capteurs.show', compact('capteur', 'donnees'));
    }
}
