<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Releve;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\Capteur;
use App\Models\CapteurDonnee;

class TestApiController extends Controller
{
    public function index()
    {
        $releves = Releve::with(['user', 'site'])->orderBy('date_releve', 'desc')->get();
        return response()->json($releves);    }
    public function addReleve(Request $request){
        $donneesValidees = $request->validate([
            'date_releve'  => 'required|date',
            'site_id'      => 'required|exists:sites,id',
            'profondeur'   => 'required|numeric',
            'observations' => 'nullable|string',
            'anomalies'    => 'boolean',
            'meteo'                   => 'nullable|string',
            'type_intervention'       => 'required|string',
            'duree_intervention'      => 'nullable|numeric',
            'etat_structure'          => 'required|string',
            'perimetre_securise'      => 'boolean',
            'fuites_visibles'         => 'boolean',
            'statut_production'       => 'required|string',
            'niveau_stockage_general' => 'nullable|numeric',
            'signature_technicien'    => 'boolean',

        ]);

        $donneesValidees['user_id'] = $request->user()->id;

        $releve = Releve::create($donneesValidees);

        return response()->json([
            'message' => 'Relevé créé avec succès',
            'releve' => $releve
        ], 201);
    }
    public function getSites() {
        $sites = Site::all(['id', 'nom']);
        return response()->json($sites);
    }
    public function indexSites() {
        $sites = Site::all();
        return response()->json($sites);
    }
    public function getSite($id) {
        $site = Site::findOrFail($id);
        return response()->json($site);
    }

    public function updateSite(Request $request, $id) {
        $site = Site::findOrFail($id);

        $site->update($request->all());

        return response()->json([
            'message' => 'Site mis à jour avec succès',
            'site' => $site
        ]);
    }

    public function getCapteursBySite($id) {
        $capteurs = Capteur::where('site_id', $id)->get();

        return response()->json($capteurs);
    }

    public function addSite(Request $request) {
        $donneesValidees = $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'ville' => 'required|string|max:255',
            'code_postal' => 'required|string|max:20',
            'type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $site = Site::create($donneesValidees);

        return response()->json([
            'message' => 'Site créé avec succès',
            'site' => $site
        ], 201);
    }

    public function getCapteurDonnees($id) {
        $capteur = Capteur::with('site')->findOrFail($id);

        $donnees = CapteurDonnee::where('capteur_id', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'capteur' => $capteur,
            'donnees' => $donnees
        ]);
    }
}
