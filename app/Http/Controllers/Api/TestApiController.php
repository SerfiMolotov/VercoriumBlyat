<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Releve;
use App\Models\Site;
use Illuminate\Http\Request;
use App\Models\Capteur;
class TestApiController extends Controller
{
    public function index()
    {
        return response()->json(Releve::all());
    }
    public function addReleve(Request $request){
        $donneesValidees = $request->validate([
            'date_releve'  => 'required|date',
            'site_id'      => 'required|exists:sites,id',
            'profondeur'   => 'required|numeric',
            'observations' => 'nullable|string',
            'anomalies'    => 'boolean',
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
}
